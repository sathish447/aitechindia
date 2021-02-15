<?php
namespace App\Traits;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Auth;
use App\Models\UserWallet;
use App\Models\AdminWallet;
use App\Models\Commission;
use DB;

trait Dashboard
{
	public function totalInvestment($currency)
	{
		$total = UserWallet::on('mysql2')->where('currency',$currency)->sum(DB::raw('balance + escrow_balance'));

		// if($currency == 'ETH' || $currency == 'LINEAR' || $currency == 'USDT')
		// {
		// 	// $eth = $this->convertToBtc($total,'ETH');
			
		// 	// if($currency == 'JADAX')
		// 	// {
		// 	// 	$final = 0.00075 * $total * $eth;
		// 	// }
		// 	// else
		// 	// {
		// 	// 	$final = $total * $eth;
		// 	// }

		// 	$final = $total;
		// }
		// elseif($currency == 'BTC')
		// {
		// 	$final = $total;
		// }
		// elseif($currency == 'LTC')
		// {
		// 	$final = $total;
		// }
		// elseif($currency == 'XRP')
		// {
		// 	$final = $total;
		// }
		// elseif($currency == 'USD')
		// {
		// 	$final = $total;
		// }


		return $total;
	}

	public function siteUserBalance()
	{
		$coinlist = Commission::get();
		$data = array();

		foreach ($coinlist as $key => $coin) {
			$coin_value = $this->totalInvestment($coin->source);
			$data[$coin->source] = round($coin_value, 2);
		}

		return $data;
	}

	public function income()
	{
		$coinlist = Commission::get();
		$data = array();

		foreach ($coinlist as $key => $coin) {
			$coin_value = $this->adminIncome($coin->source);
			$data[$coin->source] = round($coin_value, 2);
		}

		return $data;
		
	}

	public function adminIncome($coin)
	{
		$total = AdminWallet::on('mysql2')->where('currency',$coin)->sum(DB::raw('commission + withdraw'));

		return $total;
	}

	public function convertToBtc($total,$currency)
	{
		// https://pro-api.coinmarketcap.com/v1
		$url = "https://pro-api.coinmarketcap.com/v1/ticker/?convert=$currency";
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

		if (curl_errno($ch)) {
			$result = 'Error:' . curl_error($ch);
		} else {
			$result = curl_exec($ch);
		}
		$result = json_decode($result, true); 
		$final = $result['data'][1]['quotes']['ETH']['price'];
		return number_format(1/$final,3,'.','');
	}

	
}