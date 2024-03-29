@extends('layouts.admin')
@section('title', 'NPS')
@section('content')
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title"><b>NPS Forms</b></h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-2 pull-right">
                              <a href="{{route("nps-forms.create")}}">
                                  <button type="button" class="btn btn-block btn-primary">Add</button>
                              </a>
                        </div>
                    </div>
                </div>
                  <br>
                <div class="table-responsive">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Date</th>
                                <th>Title</th>
                                <th>Question</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(count($npsForms) > 0 )
                                @foreach($npsForms as $key=>$npsForm)
                                    <tr>
                                        <td>{{ date('d-m-y', strtotime($npsForm->created_at)) }}</td>
                                        <td>{{ $npsForm->title }}</td>
                                        <td>{{ $npsForm->question }}</td>
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
