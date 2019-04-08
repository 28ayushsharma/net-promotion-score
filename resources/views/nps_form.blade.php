<!DOCTYPE html>
<html>
	<head>
		<title>Net Promoter Score</title>
		<link href="http://netdna.bootstrapcdn.com/twitter-bootstrap/2.2.1/css/bootstrap-combined.min.css" rel="stylesheet" />
	</head>
	<body>
		<div class="container">
			@if(!$isAlreadyFilled)
            <form name="save_survey" method="post" action="{{ route('save_survey') }}">
                {{ csrf_field() }}
                <input type="hidden" name="survey_token" value="{{$survey_token}}">
                <div >
                    <h3>{{ $formData->title }}</h3>
                </div>
                <div >
                    <p>{{ $formData->question }}</p>
                    <div class="row-fluid">
                        <h4>
                            <span class="span1"><input type="radio" name="rating" value="0"> 0</span>
                            <span class="span1"><input type="radio" name="rating" value="1"> 1</span>
                            <span class="span1"><input type="radio" name="rating" value="2"> 2</span>
                            <span class="span1"><input type="radio" name="rating" value="3"> 3</span>
                            <span class="span1"><input type="radio" name="rating" value="4"> 4</span>
                            <span class="span1"><input type="radio" name="rating" value="5"> 5</span>
                            <span class="span1"><input type="radio" name="rating" value="6"> 6</span>
                            <span class="span1"><input type="radio" name="rating" value="7"> 7</span>
                            <span class="span1"><input type="radio" name="rating" value="8"> 8</span>
                            <span class="span1"><input type="radio" name="rating" value="9"> 9</span>
                            <span class="span2"><input type="radio" name="rating" value="10"> 10</span>
                        </h4>
                    </div>
                    <br>
                    <div class="row-fluid">
                        <div class="progress progress-striped" style="width:91.48936170212765%;">
                            <div class="bar bar-danger" style="width: 26%;"></div>
                            <div class="bar bar-warning" style="width: 36%;"></div>
                            <div class="bar bar-success" style="width: 19%;"></div>
                            <div class="bar" style="width: 19%;"></div>
                        </div>
                    </div>
                    <div class="row-fluid">
                        <div class="span1"><span class="label label-important">Not at all likely</span></div>
                        <div class="span1 offset8"><span class="label label-info">Very likely</span></div>
                    </div>
                    <br>
                    <div class="row-fluid">
                        <div class="form-group">
                            <label class="control-label">Remark (Optional)</label>
                            <textarea name="remark" class="form-control" rows="5" style="margin: 0px 0px 10px; height: 96px; width: 90%;"></textarea>
                        </div>
                    </div>
                </div>
                <div>
                    <button type="submit" class="btn btn-success">Submit Answer</button>
                </div>
            </form>
            @else
                <div class="row-fluid">
                    <h3>Thank You..! Feedback Received..!</h3>
                </div>
            @endif
		</div>
		<script src="http://netdna.bootstrapcdn.com/twitter-bootstrap/2.2.1/js/bootstrap.min.js"></script>
	</body>
</html>