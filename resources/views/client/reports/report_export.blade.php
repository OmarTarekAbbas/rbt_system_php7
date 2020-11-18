<div id="main-content">
  <div class="row">
    <div class="col-md-12 noPaddingPhone">
      <div class="box">
        <div class="box-title">
        </div>
      </div>
      <div class="box-content">

        <div class="table-responsive" id="table_wrapper">
          <table class="table table-striped table-hover fill-head" id="dvData">
            <thead>
              <tr>
                <th>#</th>
                <th>RBT ID</th>
                <th>RBT Title</th>
                <th>Year</th>
                <th>Month</th>
                <th>Code</th>
                <th>Classification</th>
                <th>Download #</th>
                <th>Total Revenue</th>
                <th>Revenu share</th>
                <th>Your Revenue</th>
                <th>Client share</th>
                <th>Provider</th>
                <th>Operator</th>
              </tr>
            </thead>
            <tbody id="table_body">
              @foreach($search_result as $record)
              <tr>
                <td>{{ $record->id }} </td>
                <td>{{ $record->rbt_id }} </td>
                <td>{{ $record->rbt_name }} </td>
                <td>{{ $record->year }} </td>
                <td>{{ $record->month }} </td>
                <td>{{ $record->code }} </td>
                <td>{{ $record->classification }} </td>
                <td>{{ $record->download_no }} </td>
                <td>{{ $record->total_revenue }} </td>
                <td>{{ $record->revenue_share }} </td>
                <td>{{ $record->your_revenu }} </td>
                <td>{{ $record->client_revenu }} </td>
                <td>{{ $record->provider->second_party_title }} </td>
                <td>{{ $record->operator->title }} </td>f
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
