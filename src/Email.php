<?php

namespace Wulfheart\Maillog;

use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Symfony\Component\Mime\Email as SymfonyEmail;
use Symfony\Component\Mime\Part\DataPart;

class Email
{
    public function __construct(
        protected string $date,
        protected ?string $from,
        protected ?string $to,
        protected ?string $cc,
        protected ?string $bcc,
        protected ?string $subject,
        protected string $body,
        protected ?string $attachments,
        protected string $raw,
    ) {

    }

    public static function fromSymfonyMail(
        SymfonyEmail $email
    ): self {
        return new self(
            Carbon::now()->format("Y-m-d H:i:s"),
            self::formatAddressField($email, 'From'),
            self::formatAddressField($email, 'To'),
            self::formatAddressField($email, 'Cc'),
            self::formatAddressField($email, 'Bcc'),
            $email->getSubject(),
            $email->getTextBody(),
            self::getAttachments($email),
            $email->toString(),
        );
    }

    public static function fromArray(array $array): self {
        return new self(
            $array['date'],
            $array['from'],
            $array['to'],
            $array['cc'],
            $array['bcc'],
            $array['subject'],
            $array['body'],
            $array['attachments'],
            $array['raw'],
        );
    }

    public function save(): void
    {
        DB::table('email_log')->insert([
            'date' => $this->date,
            'from' => $this->from,
            'to' => $this->to,
            'cc' => $this->cc,
            'bcc' => $this->bcc,
            'subject' => $this->subject,
            'body' => $this->body,
            'attachments' => $this->attachments,
            'raw' => $this->raw,
        ]);
    }

    protected static function formatAddressField(SymfonyEmail $message, string $field): ?string
    {
        $headers = $message->getHeaders();

        return $headers->get($field)?->getBodyAsString();
    }

    protected static function getAttachments(SymfonyEmail $message): ?string
    {
        if (empty($message->getAttachments())) {
            return null;
        }

        return collect($message->getAttachments())
            ->map(fn(DataPart $part) => $part->toString())
            ->implode("\n\n");
    }

}
