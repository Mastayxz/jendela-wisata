
// Script AJAX untuk pencarian realtime
                    $(document).ready(function() {
                        $('#table_search').on('input', function() {
                            var keyword = $(this).val();
                            if (keyword.length >= 3 || keyword.length === 0) {
                                $.ajax({
                                    url: "<?= base_url('admin/event/search_ajax') ?>",
                                    type: "POST",
                                    data: {
                                        table_search: keyword
                                    },
                                    success: function(data) {
                                        $('#search_results').html(data);
                                    }
                                });
                            } else {
                                // Clear the results if the keyword is too short
                                $('#search_results').html('');
                            }
                        });
                    });               