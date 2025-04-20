									<script type="text/javascript">
                                        $(document).ready(function(){
                                            $('#home').tooltip('show')
                                            $('#home').tooltip('hide')
                                        });
                                    </script>
												<script type="text/javascript">
                                        $(document).ready(function(){
                                            $('#home1').tooltip('show')
                                            $('#home1').tooltip('hide')
                                        });
                                    </script>
									    <script type="text/javascript">
                                        $(document).ready(function(){
                                            $('#login').tooltip('show')
                                            $('#login').tooltip('hide')
                                        });
                                    </script>
										    <script type="text/javascript">
                                        $(document).ready(function(){
                                            $('#signup').tooltip('show')
                                            $('#signup').tooltip('hide')
                                        });
                                    </script>
									
									    <script type="text/javascript">
                                        $(document).ready(function(){
                                            $('#sort').tooltip('show')
                                            $('#sort').tooltip('hide')
                                        });
                                    </script>
									
								
								    <script type="text/javascript">
                                        $(document).ready(function(){
                                            $('#select').tooltip('show')
                                            $('#select').tooltip('hide')
                                        });
                                    </script>
									    <script type="text/javascript">
                                        $(document).ready(function(){
                                            $('#select1').tooltip('show')
                                            $('#select1').tooltip('hide')
                                        });
                                        <script type="text/javascript">
    $(document).ready(function () {
        const tooltipIds = ['#home', '#home1', '#login', '#signup', '#sort', '#select', '#select1'];
        
        tooltipIds.forEach(function(id) {
            $(id).tooltip('show').tooltip('hide');
        });
    });
<script type="text/javascript">
    $(document).ready(function () {
        // 初始化所有 rel=tooltip 的按钮
        $('[rel="tooltip"]').tooltip();

        // 可选：点击后隐藏 tooltip，防止干扰点击
        $('[rel="tooltip"]').on('click', function () {
            $(this).tooltip('hide');
        });
    });
</script>

