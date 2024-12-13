$(document).ready(function() {
    $('#searchInput').keyup(function() {
       // console.log('after keyup ');
        $.ajax({
            url: 'db/search.php',
            type: 'post',
            data: { 'data': $(this).val() },
            error: function(xhr, status, error) {
                alert('An error occurred: ' + error);
            },
            success: function(response) {
                // console.log('entered to success ://///////// ');
                // console.log(response); // Logs the server's response
                try {
                    // Parse JSON response
                    let data = JSON.parse(response);
                    // console.log(data);
                    // Process the data (example)
                    if (data.error) {
                        alert('Error: ' + data.error);
                    } else {
                        // Handle data (e.g., display in a list or table)
                        var html ='';
                        let cellMsg='';

                        
                        
                        
                        if(data.length!=0){
                            data.forEach(element => {
                                let color = element['color'].substring(2); 
                                let cellMsg = '';
                                let alertClass = '';
                            
                                if (color.toUpperCase() === 'FF0000') {
                                    cellMsg = 'NOT FOUND';
                                    alertClass = 'alert-danger';
                                } else if (color.toUpperCase() === '002060') {
                                    cellMsg = 'APPLIED ISMAIL';
                                    alertClass = 'alert-primary';
                                } else if (color.toUpperCase() === '4472C4') {
                                    cellMsg = 'APPLIED MHMD';
                                    alertClass = 'alert-info';
                                } else if (color.toUpperCase() === '00B050') {
                                    cellMsg = 'APPLIED';
                                    alertClass = 'alert-success';
                                } else if (color.toUpperCase() === 'FFC000' || color.toUpperCase() === 'FFFF00') {
                                    cellMsg = 'Exception';
                                    alertClass = 'alert-warning';
                                } else {
                                    cellMsg = 'none';
                                    alertClass = 'alert-secondary';
                                }
                            
                                html += '<tr>';
                                html += '<td>' + element['societe'] + '</td>';
                                html += '<td>' + element['apply_at'] + '</td>';
                                html += '<td>' + element['note'] + '</td>';
                                html += `<td><div class="alert  ${alertClass} p-1 m-0">${cellMsg}</div></td>`; 
                                html += '</tr>';
                            });
                           //console.log(data.length);
                           $('thead').show(); 
                        }else{
                            $('thead').hide(); 
                            html='<div class="alert alert-warning mx-auto">No data found</div>';
                            //console.log('secon=d if ');

                        }
                        $('#tableBody').html(html);
                        
                    }
                } catch (e) {
                    console.error('Error parsing JSON:', e);
                }
            }
        });
    });
});
