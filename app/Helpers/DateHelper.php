<?php
namespace App\Helpers;

/**
 *
 */
use Carbon\Carbon;

class DateHelper
{
 

    public function today($format = null)
    {
        $format = $format ? $format : 'Y-m-d H:i:s';
        return Carbon::today()->format($format);
    }

    public function tomorrow($format = null)
    {
        $format = $format ? $format : 'Y-m-d H:i:s';
        return Carbon::tomorrow()->format($format);
    }

    public function yesterday($format = null)
    {
        $format = $format ? $format : 'Y-m-d H:i:s';
        return Carbon::yesterday()->format($format);
    }

    public function nextDay($datetime = null, $day, $format = null)
    {
        $day      = strtoupper($day);
        $format   = $format ? $format : 'Y-m-d H:i:s';
        $datetime = $datetime ? $datetime : Carbon::now();
        $days     = ['SUNDAY' => Carbon::SUNDAY, 'MONDAY' => Carbon::MONDAY, 'TUESDAY' => Carbon::TUESDAY, 'WEDNESDAY' => Carbon::WEDNESDAY, 'THURSDAY' => Carbon::THURSDAY, 'FRIDAY' => Carbon::FRIDAY, 'SATURDAY' => Carbon::SATURDAY];
        return Carbon::createFromFormat('Y-m-d H:i:s', $datetime)->next($days[$day])->format($format);
    }

    public function dayOfWeek($datetime = null)
    {
        $days     = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];
        $datetime = $datetime ? $datetime : Carbon::now();
        return $days[Carbon::createFromFormat('Y-m-d H:i:s', $datetime)->dayOfWeek];
    }

    public function ukDate($datetime = null, $timestamp = false)
    {
        $datetime  = $datetime ? $datetime : Carbon::now();
        $timestamp = $timestamp ? 'd/m/Y H:ia' : 'd/m/Y';
        return Carbon::createFromFormat('Y-m-d H:i:s', $datetime)->format($timestamp);
    }

    public function ukDateToDate($datetime = null, $timestamp = false)
    {
        $datetime  = $datetime ? $datetime : Carbon::now();
        $format    = $timestamp ? 'd/m/Y H:i:s' : 'd/m/Y';
        $timestamp = $timestamp ? 'Y-m-d H:i:s' : 'Y-m-d';
        return Carbon::createFromFormat($format, $datetime)->format($timestamp);
    }

    public function humanDate($datetime)
    {
        return Carbon::createFromFormat('Y-m-d H:i:s', $datetime)->diffForHumans();
    }

    public function age($datetime)
    {
        return Carbon::createFromFormat('Y-m-d', $datetime)->age;
    }

    public function weekend($datetime = null)
    {
        $datetime = $datetime ? $datetime : Carbon::now();
        return Carbon::createFromFormat('Y-m-d H:i:s', $datetime)->isWeekend();
    }

    public function diffInDays($datetime)
    {
        return Carbon::createFromFormat('Y-m-d H:i:s', $datetime)->diffInDays();
    }

    public function addYears($datetime = null, $years, $format = null)
    {
        $format   = $format ? $format : 'Y-m-d H:i:s';
        $datetime = $datetime ? $datetime : Carbon::now();
        return Carbon::createFromFormat('Y-m-d H:i:s', $datetime)->addYears($years)->format($format);
    }

    public function addMonths($datetime = null, $months, $format = null)
    {
        $format   = $format ? $format : 'Y-m-d H:i:s';
        $datetime = $datetime ? $datetime : Carbon::now();
        return Carbon::createFromFormat('Y-m-d H:i:s', $datetime)->addMonths($months)->format($format);
    }

    public function addWeeks($datetime = null, $weeks, $format = null)
    {
        $format   = $format ? $format : 'Y-m-d H:i:s';
        $datetime = $datetime ? $datetime : Carbon::now();
        return Carbon::createFromFormat('Y-m-d H:i:s', $datetime)->addWeeks($weeks)->format($format);
    }

    public function addDays($datetime = null, $days, $format = null)
    {
        $format   = $format ? $format : 'Y-m-d H:i:s';
        $datetime = $datetime ? $datetime : Carbon::now();
        return Carbon::createFromFormat('Y-m-d H:i:s', $datetime)->addDays($days)->format($format);
    }

    public function startOfDay($datetime = null, $format = null)
    {
        $format   = $format ? $format : 'Y-m-d H:i:s';
        $datetime = $datetime ? $datetime : Carbon::now();
        return Carbon::createFromFormat('Y-m-d H:i:s', $datetime)->startOfDay()->format($format);
    }

    public function endOfDay($datetime = null, $format = null)
    {
        $format   = $format ? $format : 'Y-m-d H:i:s';
        $datetime = $datetime ? $datetime : Carbon::now();
        return Carbon::createFromFormat('Y-m-d H:i:s', $datetime)->endOfDay()->format($format);
    }

    public function startOfWeek($datetime = null, $format = null)
    {
        $format   = $format ? $format : 'Y-m-d H:i:s';
        $datetime = $datetime ? $datetime : Carbon::now();
        return Carbon::createFromFormat('Y-m-d H:i:s', $datetime)->startOfWeek()->format($format);
    }

    public function endOfWeek($datetime = null, $format = null)
    {
        $format   = $format ? $format : 'Y-m-d H:i:s';
        $datetime = $datetime ? $datetime : Carbon::now();
        return Carbon::createFromFormat('Y-m-d H:i:s', $datetime)->endOfWeek()->format($format);
    }

    public function startOfMonth($datetime = null, $format = null)
    {
        $format   = $format ? $format : 'Y-m-d H:i:s';
        $datetime = $datetime ? $datetime : Carbon::now();
        return Carbon::createFromFormat('Y-m-d H:i:s', $datetime)->startOfMonth()->format($format);
    }

    public function endOfMonth($datetime = null, $format = null)
    {
        $format   = $format ? $format : 'Y-m-d H:i:s';
        $datetime = $datetime ? $datetime : Carbon::now();
        return Carbon::createFromFormat('Y-m-d H:i:s', $datetime)->endOfMonth()->format($format);
    }

    public function startOfYear($datetime = null, $format = null)
    {
        $format   = $format ? $format : 'Y-m-d H:i:s';
        $datetime = $datetime ? $datetime : Carbon::now();
        return Carbon::createFromFormat('Y-m-d H:i:s', $datetime)->startOfYear()->format($format);
    }

    public function endOfYear($datetime = null, $format = null)
    {
        $format   = $format ? $format : 'Y-m-d H:i:s';
        $datetime = $datetime ? $datetime : Carbon::now();
        return Carbon::createFromFormat('Y-m-d H:i:s', $datetime)->endOfYear()->format($format);
    }

    public function startOfDecade($datetime = null, $format = null)
    {
        $format   = $format ? $format : 'Y-m-d H:i:s';
        $datetime = $datetime ? $datetime : Carbon::now();
        return Carbon::createFromFormat('Y-m-d H:i:s', $datetime)->startOfDecade()->format($format);
    }

    public function endOfDecade($datetime = null, $format = null)
    {
        $format   = $format ? $format : 'Y-m-d H:i:s';
        $datetime = $datetime ? $datetime : Carbon::now();
        return Carbon::createFromFormat('Y-m-d H:i:s', $datetime)->endOfDecade()->format($format);
    }

    public function startOfCentury($datetime = null, $format = null)
    {
        $format   = $format ? $format : 'Y-m-d H:i:s';
        $datetime = $datetime ? $datetime : Carbon::now();
        return Carbon::createFromFormat('Y-m-d H:i:s', $datetime)->startOfCentury()->format($format);
    }

    public function endOfCentury($datetime = null, $format = null)
    {
        $format   = $format ? $format : 'Y-m-d H:i:s';
        $datetime = $datetime ? $datetime : Carbon::now();
        return Carbon::createFromFormat('Y-m-d H:i:s', $datetime)->endOfCentury()->format($format);
    }

}
