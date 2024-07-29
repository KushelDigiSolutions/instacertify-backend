$(document).ready(function() {
            // Fetch CSS from the server and display it in the textarea
            $.ajax({
                url: '../../../backend/admin/fairch/fnc/fetch_css.php', // PHP script to fetch CSS
                method: 'GET',
                success: function(response) {
                    $('#cssTextArea').val(response);
                },
                error: function() {
                    alert('Failed to fetch CSS');
                }
            });
        });

        function saveCSS() {
            var editedCSS = $('#cssTextArea').val();

            // Send the edited CSS to PHP to save on the server
            $.ajax({
                url: '../../../backend/admin/fairch/fnc/save_css.php', // PHP script to save CSS
                method: 'POST',
                data: { cssContent: editedCSS },
                success: function() {
                    alert('CSS saved successfully');
                },
                error: function() {
                    alert('Failed to save CSS');
                }
            });
        }