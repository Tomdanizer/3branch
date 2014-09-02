            <footer id="footer" role="contentinfo">

                <!--<div id="copyright">

                    <?php echo sprintf( __( '%1$s %2$s %3$s. All Rights Reserved.', 'threebranch' ), '&copy;', date( 'Y' ), esc_html( get_bloginfo( 'name' ) ) ); ?>

                </div>-->

                <div class="container">

                    <div class="row">

                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">

                            <ul>

                                 <?php wp_list_pages('sort_column=menu_order&exclude=152,345,306,153,150,151&title_li=<h4>' . __('Sitemap') . '</h4>' );?>

                            </ul>

                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">

                            <div>

                                <h4 class="header-text-small">Email Us</h1>
                                    <ul class="footer-list">
                                        <li>
                                            <a href="mailto:info@3branchbrewing.com">info@3branchbrewing.com</a>
                                        </li>
                                    </ul>

                            </div>

                            <div>

                                <h4 class="header-text-small">Find Us Online</h1>

                               <ul class="footer-list">

                                    <li><a href="https://www.facebook.com/3branchbrewery" target="_blank">Facebook</li>

                                </ul>

                            </div>

                        </div>

                    </div>

                </div>

        </footer>

        </div>

        <?php wp_footer(); ?>

<script src="//code.jquery.com/jquery-1.11.0.min.js"></script>

    <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.9.1/jquery-ui.min.js"></script>




<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>


      </body>

</html>