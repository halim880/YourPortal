<?php

namespace App\Enums;

use Exception;

class ApplicationStatus
{
    private const PENDING = 'pending';
    private const APPROVED = 'approved';
    private const REJECTED = 'rejected';

    /**
     * @var ApplicationStatus[]
     */
    private static $values = null;
    /**
     * @var string
     */
    private $status;
    /**
     * @var string
     */
    private $displayValue;

    public function __construct(string $status, string $displayValue = null)
    {
        $this->status = $status;
        $this->displayValue = $displayValue;
    }

    /**
     * @param string $status
     * @return ApplicationStatus
     * @throws Exception
     */
    public static function fromStatus(string $status): ApplicationStatus
    {
        foreach (self::values() as $ApplicationStatus) {
            if ($ApplicationStatus->getStatus() === $status) {
                return $ApplicationStatus;
            }
        }
        throw new Exception('Unknown application status: ' . $status);
    }

    /**
     * @param string $displayValue
     * @return ApplicationStatus
     * @throws Exception
     */
    public static function fromDisplayValue($displayValue)
    {
        foreach (self::values() as $ApplicationStatus) {
            if ($ApplicationStatus->getDisplayValue() === $displayValue) {
                return $ApplicationStatus;
            }
        }
        throw new Exception('Unknown application status display value: ' . $displayValue);
    }

    /**
     * @return ApplicationStatus[]
     */
    public static function values(): array
    {
        if (is_null(self::$values)) {
            self::$values = [
                self::PENDING => new ApplicationStatus(self::PENDING, 'Pending'),
                self::APPROVED => new ApplicationStatus(self::APPROVED, 'Approved'),
                self::REJECTED => new ApplicationStatus(self::REJECTED, 'Rejected'),
            ];
        }
        return self::$values;
    }

    /**
     * @return ApplicationStatus
     */
    public static function pending(): ApplicationStatus
    {
        return self::values()[self::PENDING];
    }

    /**
     * @return ApplicationStatus
     */
    public static function approved(): ApplicationStatus
    {
        return self::values()[self::APPROVED];
    }

    /**
     * @return ApplicationStatus
     */
    public static function rejected(): ApplicationStatus
    {
        return self::values()[self::REJECTED];
    }

    /**
     * @return string
     */
    public function getStatus(): string
    {
        return $this->status;
    }

    /**
     * @return string
     */
    public function getDisplayValue(): string
    {
        return $this->displayValue;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return (string) $this->status;
    }
}
