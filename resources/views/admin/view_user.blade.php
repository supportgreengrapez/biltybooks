
    @extends('admin.layout.app')
    @section('content')
    <!-- page content -->
    <div class="right_col" role="main">
      <div class="">
        <div class="page-title">
          <div class="title_left">
            <h3>View User</h3>
          </div>
        </div>
        <div class="clearfix"></div>
        <div class="row">
          <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
              <div class="x_content">
                <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Email</th>
                      <th>First Name</th>
                      <th>Last Name</th>
                      <th>Country</th>
                                            <th>City</th>
                                                                  <th>Phone Number</th>
                      <th>Subscription</th>
                      
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @if(count($u)>0)
                    @foreach($u as $user)
                    <tr>
                      <td>{{$user->id}}</td>
                      <td>{{$user->username}}</td>
                      <td>{{$user->fname}}</td>
                      <td>{{$user->lname}}</td>
                      <td>{{$user->country}}</td>
                      <td>{{$user->city}}</td>
                      <td>{{$user->phone_number}}</td>
                      <td>{{$user->subscription}}</td>
                    <td><a href="{{url('/')}}/admin-user-detail/{{$user->id}}">view</a></td>
                    </tr>
                    @endforeach
                    @endif
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- /page content --> 
    @endsection