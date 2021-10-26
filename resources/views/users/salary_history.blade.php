<div class="modal fade" id="salaryHistory" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
         
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{$user->name}} History</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
               {{-- Start User Salary History --}}
                <h3 class="mb-1">Salary History</h3>
                <div class="table-responsive">
                    <table class="table align-items-center table-flush dataTable2">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col">Date</th>
                            <th scope="col">Salary</th>
                            <th scope="col">Status</th>
                            </tr>
                        </thead>
                        <tbody> 
                            @foreach ($user->salaries() as $salary)
                            <tr>
                            <th scope="row">
                                <span style=" font-size: 12px; " class="badge bg-dark"><i class="bi bi-calendar2-day-fill"></i> {{$salary->date ? \Carbon\Carbon::parse($salary->date)->format('d/m/Y') : 'Not Paid Yet'}}</span>
                            </th>
                            <td>
                                <span style=" font-size: 12px; " class="badge bg-success">${{$salary->salary}}</span>
                            </td>
                            <td>
                                <div class="avatar-group">
                                <span style=" font-size: 12px; " class="badge bg-{{$salary->status ? 'primary' : 'warning'}}"> {{$salary->status ? 'Paid' : 'Pendding'}}</span>
                                </div>
                            </td>
                            </tr>
                            @endforeach
                    </tbody>
                    </table>
            </div>
            {{-- End User Salary History --}}

            {{-- Start User Discount History --}}
            <h3 class="mb-1">Discount History</h3>
            <div class="table-responsive">
                <table class="table align-items-center table-flush dataTable2">
                <thead class="thead-light">
                    <tr>
                        <th scope="col">Date</th>
                        <th scope="col">Discount</th>
                        <th scope="col">Comment</th>
                        </tr>
                    </thead>
                    <tbody> 
                        @foreach ($user->discounts() as $discount) 
                        <tr>
                        <th scope="row">
                            <span style=" font-size: 12px; " class="badge bg-dark"><i class="bi bi-calendar2-day-fill"></i> {{\Carbon\Carbon::parse($discount->created_at)->format('d/m/Y')}}</span>
                        </th>
                        <td>
                            <span style=" font-size: 12px; " class="badge bg-danger">${{$discount->amount}}</span>
                        </td>
                        <td>
                            <div class="avatar-group">
                               <p>{{$discount->comment ? $discount->comment : 'No Comment'}}</p>
                            </div>
                        </td>
                        </tr>
                        @endforeach
                </tbody>
                </table>
        </div>
        {{-- End User Discount History --}}



                    {{-- Start User Bouns History --}}
                    <h3 class="mb-1">Bouns History</h3>
                    <div class="table-responsive">
                        <table class="table align-items-center table-flush dataTable2">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">Date</th>
                                <th scope="col">Bouns</th>
                                <th scope="col">Comment</th>
                                </tr>
                            </thead>
                            <tbody> 
                                @foreach ($user->bouns() as $bouns)
                                <tr>
                                <th scope="row">
                                    <span style=" font-size: 12px; " class="badge bg-dark"><i class="bi bi-calendar2-day-fill"></i> {{\Carbon\Carbon::parse($bouns->created_at)->format('d/m/Y')}}</span>
                                </th>
                                <td>
                                    <span style=" font-size: 12px; " class="badge bg-success">+${{$bouns->amount}}</span>
                                </td>
                                <td>
                                    <div class="avatar-group">
                                       <p>{{$bouns->comment ? $bouns->comment : 'No Comment'}}</p>
                                    </div>
                                </td>
                                </tr>
                                @endforeach
                        </tbody>
                        </table>
                </div>
                {{-- End User Bouns History --}}
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              </div>
      </div>
    </div>
  </div>