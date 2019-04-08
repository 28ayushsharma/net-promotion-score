@extends('layouts.admin')
@section('title', 'Dashboard')
@section('content')
<section class="content">
    <!-- Small boxes (Stat box) -->
    <div class="row">
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-green">
                <div class="inner">
                    <h3>{{ $promotors }}</h3>

                    <p>Promoters</p>
                </div>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-red">
                <div class="inner">
                    <h3>{{ $detractors }}</h3>
{{-- <sup style="font-size: 20px">%</sup> --}}
                    <p>Detractors</p>
                </div>
              
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
        
            <div class="small-box bg-yellow">
                <div class="inner">
                    <h3>{{ $passives }}</h3>

                    <p>Passives</p>
                </div>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-aqua">
                <div class="inner">
                    <h3>{{ $total_nps }}</h3>

                    <p>Total Submitted NPS</p>
                </div>
            </div>
        </div>
        <!-- ./col -->
    </div>
    <!-- /.row -->
</section>
@endsection