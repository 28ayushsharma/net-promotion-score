     /**
    * getting widget
    */
    function getWidget(nps_key){
        fetch('http://28ayushsharma.epizy.com/public/api/get-widget?nps_key='+nps_key,{
            method: "get",            
            headers: {
                'Accept': 'text/plain',
                'Content-Type': 'application/json'
            }
        })
        .then(
            function(response) {
                return response.text();
            }
        ).then(function(string) {
            document.getElementById("load-widget").innerHTML = string;
        })
        .catch(function(err) {
            console.log('Fetch Error :-S', err);
        });
    }

    function save_survey(){
        var rating = document.querySelector('input[name = "rating"]:checked') != null ? document.querySelector('input[name = "rating"]:checked').value :'';
        var email = document.querySelector('input[name = "survey_email"').value;
        var survey_remark = document.querySelector('textarea[name = "survey_remark"').value;
        var nps_key = document.querySelector('input[name = "nps_key"').value;
        if(rating == ""){
            alert("Please fill rating.");
            return false;
        }else if(email == ""){
            alert("Please fill email");
            return false;
        }

        fetch("http://28ayushsharma.epizy.com/public/api/store-widget", {
            method: 'post',
            headers: {
                'Accept': 'application/json',
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({"rating" : rating, "email": email, "remark":survey_remark, "nps_key" : nps_key})
        })
        .then(function (response) {
            response.json().then(function(data) {
                console.log(data);
                if(data.status == 100){
                    alert("Please enter valid input.");
                }else if(data.status == 102){
                    alert("Survey already filled with this email.");
                }else if(data.status == 200){
                    alert("Surey submitted successfully.");
                    document.getElementById("survey_form").reset();
                }
                
            });
        })
        .catch(function (error) {
            console.log('Request failed', error);
        });

    }