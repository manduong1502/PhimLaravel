<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use Carbon\Carbon;
use App\Models\User;
use Illuminate\Support\Facades\Log;

class CheckVipExpired
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * Create a new event instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return array<int, \Illuminate\Broadcasting\Channel>
     */
    public function broadcastOn(): array
    {
        return [
            new PrivateChannel('channel-name'),
        ];
    }

    public function check()
    {
        Log::channel('single')->info('Scheduled task CheckVipExpired is running...');
        $users = User::where('vip_end_date', '<=', Carbon::now('Asia/Ho_Chi_Minh')->toDateTimeString())->whereHas('roles', function ($query) {
            $query->where('name', 'uservip');
        })->get();

        foreach ($users as $user) {
            $user->removeRole('uservip'); // Xóa vai trò uservip
            $user->assignRole('userfree'); // Gán lại vai trò userfree

            // Cập nhật thời gian hết hạn VIP
            $user->vip_end_date = null; // Đặt thời gian hết hạn là null hoặc thời gian mặc định cho userfree
            $user->save(); // Lưu thông tin người dùng
            Log::channel('single')->info('User ' . $user->id . ' has been updated.');
        }

    }
}
