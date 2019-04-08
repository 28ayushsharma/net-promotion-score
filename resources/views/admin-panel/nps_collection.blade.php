@extends('layouts.admin')
@section('title', 'NPS Collection')
@section('content')
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title"><b>NPS Collections</b></h3>
                </div>
                <!-- /.box-header -->
                <form method="post">
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-4 form-group">
                            <input class="form-control" type="text" name="email" placeholder="Enter email to search">
                        </div>
                        <div class="col-md-2">
                              <a href="#">
                                  <button type="button" class="btn btn-block btn-primary">Search</button>
                              </a>
                        </div>
                    </div>
                </div>
                </form>
                  <br>
                <div class="table-responsive">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>NPS Title</th>
                                <th>Submitted On</th>
                                <th>Email</th>
                                <th>Rating</th>
                                <th width="40%">Remark</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(count($nps_collection) > 0 )
                                @foreach($nps_collection as $key=>$npsData)
                                    <tr>
                                        <td>{{ $npsData->nps_form->title }}</td>
                                        <td>{{ date('d-m-y', strtotime($npsData->submitted_on)) }}</td>
                                        <td>{{ $npsData->email }}</td>
                                        <td>{{ ($npsData->rating) }}</td>
                                        <td>{{ $npsData->remark != ""? $npsData->remark : "--"   }}</td>
                                        <td>
                                            @if($npsData->rating > 8)
                                                <h4><span class="label label-success">Promoters</span></h4>
                                            @elseif($npsData->rating > 6 && $npsData->rating < 9)
                                                <h4><span class="label label-warning">Passives</span></h4>
                                            @else
                                                <h4><span class="label label-danger">Detractors</span></h4>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="4">
                                        <center> No Record Found </center>
                                    </td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
              <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
</section>
  <!-- /.content -->
@endsection
