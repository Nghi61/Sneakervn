<?php //app/Mail/Guimail.php
namespace App\Mail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
class MailBill extends Mailable {
    use Queueable, SerializesModels;
    public $name="";
    public $MHD="";
    public function __construct( $name, $MHD ){
        $this->name = $name;
        $this->MHD = $MHD;
    }
    public function envelope() {
        return new Envelope(subject: 'Mail hóa đơn từ Sneaker',);
    }
    public function content() {
       return new Content( view: 'Clients.MailBill',);
    }
    public function attachments() { return []; }
}
