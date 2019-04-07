@extends('layouts.admin')
@section('title', 'Create NPS')
@section('content')

<section class="content">
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="row">
        <!-- left column -->
        <div class="col-md-12">
        <!-- general form elements -->
            <div class="box box-info">
                <div class="box-header with-border">
                  <h3 class="box-title">Generate NPS Key</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form class="form-horizontal" method="post" action="{{route("nps-key.store")}}">
                  {{ csrf_field() }}
                    <div class="box-body">
                        <div class="form-group">
                            <label class="col-md-2 control-label">NPS Form<span style="color:red;">*</span></label>
                            <div class="col-md-8">
                                <select name="nps_form" class="form-control">
                                    <option value="">Select</option>
                                    @if(count($npsForms)>0)
                                        @foreach($npsForms as $id => $title)
                                            <option value="{{$id}}">{{$title}}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                        </div>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <button type="submit" class="btn btn-success pull-right">Generate Code</button>
                    </div>
                    <!-- /.box-footer -->
                </form>
            </div>
        </div>
    </div>
</section>
@endsection
