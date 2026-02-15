<?php

declare(strict_types=1);

/**
 * PrivateBin
 *
 * a zero-knowledge paste bin
 *
 * @link      https://github.com/PrivateBin/PrivateBin
 * @copyright 2012 Sébastien SAUVAGE (sebsauvage.net)
 * @license   https://www.opensource.org/licenses/zlib-license.php The zlib/libpng License
 */

namespace PrivateBin;

use Exception;

/**
 * Filter
 *
 * Provides data filtering functions.
 */
class Filter
{
    /**
     * Format a given time into a human readable label (localized).
     *
     * This version accepts two arguments: an integer value and a unit string.
     * Examples: `formatHumanReadableTime(5, 'min')` -> "5 minutes".
     *
     * @access public
     * @static
     * @param  int    $value
     * @param  string $unit
     * @throws Exception
     * @return string
     */
    public static function formatHumanReadableTime(int $value, string $unit)
    {
        $unit = trim(strtolower($unit));

        // normalize common shortcuts
        switch ($unit) {
            case 'sec':
            case 'second':
            case 'seconds':
                $base = 'second';
                break;
            case 'min':
            case 'minute':
            case 'minutes':
                $base = 'minute';
                break;
            case 'hour':
            case 'hours':
                $base = 'hour';
                break;
            case 'day':
            case 'days':
                $base = 'day';
                break;
            case 'week':
            case 'weeks':
                $base = 'week';
                break;
            case 'month':
            case 'months':
                $base = 'month';
                break;
            case 'year':
            case 'years':
                $base = 'year';
                break;
            default:
                // try to strip a trailing 's' and accept that
                $base = rtrim($unit, 's');
                if ($base === '') {
                    throw new Exception("Error parsing time format '{$value}{$unit}'", 30);
                }
        }

        return I18n::_(array('%d ' . $base, '%d ' . $base . 's'), $value);
    }

    /**
     * format a given number of bytes in IEC 80000-13:2008 notation (localized)
     *
     * @access public
     * @static
     * @param  int $size
     * @return string
     */
    public static function formatHumanReadableSize($size)
    {
        $iec = array('B', 'kB', 'MB', 'GB', 'TB', 'PB', 'EB', 'ZB', 'YB');
        $i   = 0;
        while (($size / 1000) >= 1) {
            $size = $size / 1000;
            ++$i;
        }
        return number_format($size, $i ? 2 : 0, '.', ' ') . ' ' . I18n::_($iec[$i]);
    }
}
