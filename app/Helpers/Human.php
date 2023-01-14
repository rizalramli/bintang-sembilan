<?php
namespace App\Helpers;

use Modules\Transaction\Models\OutcomingWood;
use Modules\Transaction\Models\TruckRental;

/**
 * 
 */
class Human 
{
	public static function createFormatRupiah($string)
    {
        if (intVal($string) < 0) {
            return '-' . number_format(intval($string), 0, ',', '.');
        } else {
            return number_format(intval($string), 0, ',', '.');
        }
    }

    public static function removeFormatRupiah($string)
    {
        return intval(str_replace(".", "", $string));
    }

	public static function datetimeFormat($datetime)
	{
		return date('d/m/Y H:i', strtotime($datetime));
	}

	public static function dateFormat($datetime)
	{
		return date('d/m/Y', strtotime($datetime));
	}

	public static function getVehicleNumber()
	{
		$outcomingWood = OutcomingWood::pluck('number_vehicles','number_vehicles')->prepend('Semua Nopol', null);
		return $outcomingWood;
	}

	public static function getVehicleNumberTruckRental()
	{
		$truckRental = TruckRental::pluck('number_vehicles','number_vehicles')->prepend('Semua Nopol', null);
		return $truckRental;
	}

	public static function monthIndonesia()
	{
		$month = [
			'01' => 'Januari',
			'02' => 'Februari',
			'03' => 'Maret',
			'04' => 'April',
			'05' => 'Mei',
			'06' => 'Juni',
			'07' => 'Juli',
			'08' => 'Agustus',
			'09' => 'September',
			'10' => 'Oktober',
			'11' => 'November',
			'12' => 'Desember',
		];

		return $month;
	}

	public static function yearReport()
	{
		$year = [];
		$count = 10;
		$year_now = date('Y');
		for ($i=0; $i < $count; $i++) { 
			$year[$year_now] = $year_now;
			$year_now--;
		}

		return $year;
	}
	
	public static function num2text( $n, $precision = 1 ) {
	if ($n < 900) {
		// 0 - 900
		$n_format = number_format($n, $precision);
		$suffix = '';
	} else if ($n < 900000) {
		// 0.9k-850k
		$n_format = number_format($n / 1000, $precision);
		$suffix = 'K';
	} else if ($n < 900000000) {
		// 0.9m-850m
		$n_format = number_format($n / 1000000, $precision);
		$suffix = 'M';
	} else if ($n < 900000000000) {
		// 0.9b-850b
		$n_format = number_format($n / 1000000000, $precision);
		$suffix = 'B';
	} else {
		// 0.9t+
		$n_format = number_format($n / 1000000000000, $precision);
		$suffix = 'T';
	}

  // Remove unecessary zeroes after decimal. "1.0" -> "1"; "1.00" -> "1"
  // Intentionally does not affect partials, eg "1.50" -> "1.50"
	if ( $precision > 0 ) {
		$dotzero = '.' . str_repeat( '0', $precision );
		$n_format = str_replace( $dotzero, '', $n_format );
	}

	return $n_format . $suffix;
}

}

