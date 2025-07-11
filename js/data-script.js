
$(document).ready(function() {
            // Load existing contacts when page loads
            loadContacts();
            
            // Form submission
            $('.form-signup').on('submit', function(e) {
                e.preventDefault();
                
                // Get form data
                var formData = {
                    name: $('#name').val(),
                    email: $('#emailAddress').val(),
                    message: $('#message').val()
                };
                
                // Disable submit button and show loading
                $('#submitButton').prop('disabled', true).html('<i class="bi bi-hourglass-split me-2"></i>Sending...');
                $('#response-message').hide();
                
                // Make AJAX request
                $.ajax({
                    url: 'submit.php',
                    type: 'POST',
                    data: formData,
                    dataType: 'json',
                    success: function(response) {
                        if (response.success) {
                            showMessage(response.message, 'success');
                            // Clear form on success
                            $('.form-signup')[0].reset();
                            // Reload contacts to show the new one
                            loadContacts();
                        } else {
                            showMessage(response.message, 'danger');
                        }
                    },
                    error: function(xhr, status, error) {
                        var errorMessage = 'An error occurred while submitting the form.';
                        if (xhr.responseJSON && xhr.responseJSON.message) {
                            errorMessage = xhr.responseJSON.message;
                        }
                        showMessage(errorMessage, 'danger');
                    },
                    complete: function() {
                        // Re-enable submit button
                        $('#submitButton').prop('disabled', false).html('<i class="bi bi-send me-2"></i>Send Message');
                    }
                });
            });
            
            function showMessage(message, type) {
                var $responseDiv = $('#response-message');
                $responseDiv.removeClass().addClass('alert alert-' + type);
                $responseDiv.html('<i class="bi bi-' + (type === 'success' ? 'check-circle' : 'exclamation-triangle') + ' me-2"></i>' + message).show();
                
                // Auto-hide success messages after 5 seconds
                if (type === 'success') {
                    setTimeout(function() {
                        $responseDiv.fadeOut();
                    }, 5000);
                }
            }
            
            function loadContacts() {
                $.ajax({
                    url: 'submit.php',
                    type: 'GET',
                    dataType: 'json',
                    success: function(response) {
                        if (response.success && response.data) {
                            displayContacts(response.data);
                        } else {
                            showNoContacts();
                        }
                    },
                    error: function() {
                        showNoContacts();
                    }
                });
            }
            
            function displayContacts(contacts) {
                var $container = $('#contacts-container');
                
                if (contacts.length === 0) {
                    showNoContacts();
                    return;
                }
                
                var html = '';
                contacts.forEach(function(contact) {
                    var date = new Date(contact.created_at || Date.now()).toLocaleDateString();
                    html += `
                        <div class="contact-item">
                            <div class="d-flex justify-content-between align-items-start">
                                <div class="flex-grow-1">
                                    <div class="contact-name">${escapeHtml(contact.name)}</div>
                                    <div class="contact-email">
                                        <i class="bi bi-envelope me-1"></i>${escapeHtml(contact.email)}
                                    </div>
                                    <div class="contact-message">${escapeHtml(contact.message)}</div>
                                    <div class="contact-date">
                                        <i class="bi bi-calendar me-1"></i>${date}
                                    </div>
                                </div>
                                <div class="ms-3">
                                    <span class="badge bg-primary">#${contact.id}</span>
                                </div>
                            </div>
                        </div>
                    `;
                });
                
                $container.html(html);
            }
            
            function showNoContacts() {
                $('#contacts-container').html(`
                    <div class="no-contacts">
                        <i class="bi bi-inbox display-1 text-light opacity-50"></i>
                        <h4 class="text-light mt-3">No messages yet</h4>
                        <p class="text-light opacity-75">Be the first to send us a message!</p>
                    </div>
                `);
            }
            
            function escapeHtml(text) {
                var map = {
                    '&': '&amp;',
                    '<': '&lt;',
                    '>': '&gt;',
                    '"': '&quot;',
                    "'": '&#039;'
                };
                return text.replace(/[&<>"']/g, function(m) { return map[m]; });
            }
        });