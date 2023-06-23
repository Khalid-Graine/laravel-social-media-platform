<?php
namespace App\Mail;

use App\Models\Profile;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Contracts\Queue\ShouldQueue;

class ProfileMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    public function __construct(private Profile $profile)
    {
        //
    }

    /**

     * @return $this
     */
    public function build()
    {
        $data = $this->profile->created_at;
        $id = $this->profile->id;

        $href = url('').'/verify_email/'.base64_encode($data.'///'.$id);

        return $this->subject('Profile Mail')
            ->view('emails.inscreption')
            ->with([
                'name' => $this->profile->name,
                'email' => $this->profile->email,
                'href' => $href
            ]);
    }
}
