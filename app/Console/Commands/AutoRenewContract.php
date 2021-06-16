<?php

namespace App\Console\Commands;

use App\Contract;
use App\ContractRenew;
use App\Http\Services\ContractRenewService;
use Carbon\Carbon;
use Illuminate\Console\Command;

class AutoRenewContract extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'contract:auto_renew';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Renew Contract Auto Renew Contract';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(ContractRenewService $contractRenewService)
    {
        parent::__construct();
        $this->contractRenewService = $contractRenewService;
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
      // this is originalcontract
      $contracts = Contract::where("renewal_status", 1)
      ->where('contract_expiry_date', Carbon::now()->format('Y-m-d'))
      ->get();

      foreach ($contracts as $contract) {
        $data['contract_id'] = $contract->id;
        $data['renew_start_date']  = Carbon::parse($contract->contract_expiry_date)->addDays(1)->format('d-m-Y');
        $data['renew_expire_date'] = Carbon::parse($contract->contract_expiry_date)->addMonth(get_number_of_month($contract->duration->contract_duration_title))->format('d-m-Y');
        $data['renew_duration_id'] = $contract->duration->contract_duration_id;
        $contractRenew = $this->contractRenewService->handle($data);
        $this->sendMailToAllUser($contractRenew);
      }

      //this is contract renew
      $contractRenews = ContractRenew::whereHas('contract', function($q){
        $q->where("renewal_status" , 1);
      })
      ->where('renew_expire_date', Carbon::now()->format('Y-m-d'))
      ->get();

      foreach ($contractRenews as $contractRenew) {
        $data['contract_id'] = $contractRenew->contract->id;
        $data['renew_start_date']  = Carbon::parse($contractRenew->renew_expire_date)->addDays(1)->format('d-m-Y');
        $data['renew_expire_date'] = Carbon::parse($contractRenew->renew_expire_date)->addMonth(get_number_of_month($contractRenew->contract->duration->contract_duration_title))->format('d-m-Y');
        $data['renew_duration_id'] = $contractRenew->contract->duration->contract_duration_id;
        $contractRenew = $this->contractRenewService->handle($data);
        $this->sendMailToAllUser( $contractRenew);
      }

    }

    public function sendMailToAllUser($contractRenew)
    {
      $subject = "Contract Expire Data Notify";
      $url     = url('contracts/'.$contractRenew->contract->id.'/renew?contract_renew_id='.$contractRenew->id);
      $emails  = explode(',',setting('notifiy_contract_emails'));
      \Mail::send('emails.contract', ['contractRenew' => $contractRenew, 'url' => $url], function($email) use ($subject, $emails)
      {
          $email->from('contract@gmail.com','ivas_system');
          $email->to($emails)->subject($subject);
      });
    }
}
