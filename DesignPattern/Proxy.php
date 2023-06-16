<?php

interface MailerInterface
{
    public function send(Mail $mail): void;
}

class LoggingMailerProxy implements MailerInterface
{
    public function __construct(
        protected MailerInterface $target,
        protected LoggerInterface $logger
    ) {}

    public function send(Mail $mail): void
    {
        $this->logger->info("Before send " . $mail->address);
        $this->target->send($mail);
        $this->logger->info("After send ". $mail->address);
    }
}

class JobWorker
{
    public function __construct(
        protected MailerInterface $mailer
    ) {}

    public function process(): void
    {
        $reportMail = new Mail();
        $this->mailer->send($reportMail);
    }
}