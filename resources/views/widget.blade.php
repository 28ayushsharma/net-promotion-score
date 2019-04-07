<style>
 .btn{ padding: 4px 12px; margin-bottom: 0; font-size: 14px;line-height: 20px;}
 .btn-success{ background-color: #5bb75b; color: #ffffff; text-shadow: 0 -1px 0 rgba(0, 0, 0, 0.25);}
 .label{ display: inline-block;
    padding: 2px 4px;
    font-size: 11.844px;
    font-weight: bold;
    line-height: 14px;
    color: #ffffff;
    vertical-align: baseline;
    white-space: nowrap;
    text-shadow: 0 -1px 0 rgba(0, 0, 0, 0.25);}
 .label-important{ background-color: #b94a48;}
 .label-info{ background-color: #3a87ad; }
 .offset8{ margin-left: 20%;}
 .span1{display: inline;}
 .m-t-10{margin-top: 10px;}
 .email-text{width: 30%;}
 .form-field{ display: block;
    height: 34px;
    padding: 6px 12px;
    font-size: 14px;
    line-height: 1.42857143;
    color: #555;
    background-color: #fff;
    background-image: none;
    border: 1px solid #ccc;
    border-radius: 4px;}
</style>

<div>
    <form id="survey_form" name="survey_form" action="javascript:void(0);" onsubmit="save_survey()">
        <div>
            <h3>{{ $widgetData->nps_form->title }}</h3>
        </div>
        <div>
            <p>{{ $widgetData->nps_form->question}}</p>
            <div>
                <h4>
                    <span><input class="span1" type="radio" name="rating" value="0"> 0</span>
                    <span><input class="span1" type="radio" name="rating" value="1"> 1</span>
                    <span><input class="span1" type="radio" name="rating" value="2"> 2</span>
                    <span><input class="span1" type="radio" name="rating" value="3"> 3</span>
                    <span><input class="span1" type="radio" name="rating" value="4"> 4</span>
                    <span><input class="span1" type="radio" name="rating" value="5"> 5</span>
                    <span><input class="span1" type="radio" name="rating" value="6"> 6</span>
                    <span><input class="span1" type="radio" name="rating" value="7"> 7</span>
                    <span><input class="span1" type="radio" name="rating" value="8"> 8</span>
                    <span><input class="span1" type="radio" name="rating" value="9"> 9</span>
                    <span><input class="span1" type="radio" name="rating" value="10"> 10</span>
                </h4>
            </div>
            <div>
                <div class="span1"><span class="label label-important">Not at all likely</span></div>
                <div class="span1 offset8"><span class="label label-info">Very likely</span></div>
            </div>
            <div class="m-t-10">
                <input name="nps_key" type="hidden" value="{{ $widgetData->nps_code_key }}">
                <input class="form-field email-text" type="text" name="survey_email" placeholder="Enter email here">
            </div>
            <div class="m-t-10">
                <textarea class="form-field" name="survey_remark" rows="5" style="margin: 0px 0px 10px; height: 96px; width: 30%;" placeholder="Remark(Optional)"></textarea>
            </div>
        </div>
        <div>
            <button type="submit" class="btn btn-success">Submit Answer</button>
        </div>
    </form>
</div>
