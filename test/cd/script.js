$('#form').toggle();
                $('.update-form').submit(function(event){
                    event.preventDefault();
                    data = $(this).serialize();
                    var request = $.ajax({
                    url: "update.php",
                    type: "POST",
                    data: data
                });
                    request.done(function(response){
                        if(response == "Succ"){
                            location.reload();
                        }
                        else{
                            alert(response);
                        }
                    });
                });
                $('.pridat').click(function(){
                        $('#add-form').toggle();

                });
                $('.pridat-cat').click(function(){
                        $('#add-form-cat').toggle();

                });
                $('#add-form, #add-form-cat').submit(function(event){
                    event.preventDefault();
                    data = $(this).serialize();
                    var request = $.ajax({
                    url: "add.php",
                    type: "POST",
                    data: data
                });
                    request.done(function(response){
                        if(response == "Succ"){
                            location.reload();
                        }
                        else{
                            alert(response)
                        }
                    });
                });
                $('.delete-form').submit(function(event){
                    event.preventDefault();
                    data = $(this).serialize();
                    var request = $.ajax({
                    url: "delete.php",
                    type: "POST",
                    data: data
                });
                    request.done(function(response){
                        if(response == "Succ"){
                            location.reload();
                        }
                        else{
                            alert(response)
                        }
                    });
                });
                $('.add-category').click(function(event){
                    event.preventDefault();

                });