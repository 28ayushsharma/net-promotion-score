@extends('layouts.admin')
@section('title', 'NPS Keys')
@section('content')
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title"><b>NPS KEYS</b></h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-2 pull-right">
                              <a href="{{route("nps-key.create")}}">
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
                                <th>Generated On</th>
                                <th>Nps form Title</th>
                                <th>Keys</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(count($npsKeys) > 0 )
                                @foreach($npsKeys as $key=>$npsKey)
                                    <tr>
                                        <td>{{ date('d-m-y', strtotime($npsKey->created_at)) }}</td>
                                        <td>{{ $npsKey->nps_form->title }}</td>
                                        <td>{{ $npsKey->nps_code_key }}</td>
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
