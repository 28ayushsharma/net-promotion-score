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
                  <h3 class="box-title">Add New NPS Form</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form class="form-horizontal" method="post" action="{{route("nps-forms.store")}}">
                  {{ csrf_field() }}
                    <div class="box-body">
                        <div class="form-group">
                          <label for="title" class="col-sm-2 control-label">Title<span style="color:red;">*</span></label>
                          <div class="col-sm-8">
                                <input name="title" type="text" class="form-control" placeholder="Form Title" value="">
                          </div>
                        </div>
                    </div>
                    <div class="box-body">
                        <div class="form-group">
                          <label for="question" class="col-sm-2 control-label">Question<span style="color:red;">*</span></label>
                          <div class="col-sm-8">
                                <input name="question" type="text" class="form-control" placeholder="Question" value="">
                          </div>
                        </div>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <button type="submit" class="btn btn-success pull-right">Save</button>
                    </div>
                    <!-- /.box-footer -->
                </form>
            </div>
        </div>
    </div>
</section>
@endsection
