@extends('frontend.layouts.front')

@section('content')
<div id="content" class="site-content">
    <div id="primary" class="content-area column two-thirds">
        <main id="main" class="site-main" role="main">
            <article>
                <header class="entry-header">
                    <h1 class="entry-title">{{$post->title}}</h1>
                    <div class="entry-meta">
                        <span class="posted-on"><time class="entry-date published">April 6,
                                2016</time></span>
                        <span class="comments-link"><a href="#">Leave a comment</a></span>
                    </div>
                    <div class="entry-thumbnail">
                        <img src="http://s3.amazonaws.com/caymandemo/wp-content/uploads/sites/10/2015/09/30160348/sep4.jpg"
                            alt="">
                    </div>
                </header>
                <!-- .entry-header -->
                <div class="entry-content">
                    <p>
                       {!!$post->post!!}
                    </p>
                    
                </div>
                <!-- .entry-content -->
                <footer class="entry-footer">
                
                    <span class="cat-links">
                        By {{$post->author}}
                    </span>
                </footer>
                <!-- .entry-footer -->
            </article>
            <!-- #post-## -->
            <nav class="navigation post-navigation" role="navigation">
                <h1 class="screen-reader-text">Post navigation</h1>
                <div class="nav-links">
                    <div class="nav-previous">
                        <a href="#" rel="prev"><span class="meta-nav">←</span> More Posts</a>
                    </div>
                </div>
                <!-- .nav-links -->
            </nav>
            <!-- .navigation -->
            <div id="comments" class="comments-area">
                <div id="respond" class="comment-respond">
                    <h3 id="reply-title" class="comment-reply-title">Leave a Reply <small><a rel="nofollow"
                                id="cancel-comment-reply-link" href="/demo-moschino/embed-audio/#respond"
                                style="display:none;">Cancel reply</a></small></h3>
                    <form action="http://www.themepush.com/demo-moschino/wp-comments-post.php" method="post"
                        id="commentform" class="comment-form" novalidate="">
                        <p class="comment-notes">
                            <span id="email-notes">Your email address will not be published.</span> Required
                            fields are marked <span class="required">*</span>
                        </p>
                        <p class="comment-form-comment">
                            <label for="comment">Comment</label><textarea id="comment" name="comment"
                                cols="45" rows="8" aria-required="true" required="required"></textarea>
                        </p>
                        <p class="comment-form-author">
                            <label for="author">Name <span class="required">*</span></label><input
                                id="author" name="author" type="text" value="" size="30"
                                aria-required="true" required="required">
                        </p>
                        <p class="comment-form-email">
                            <label for="email">Email <span class="required">*</span></label><input
                                id="email" name="email" type="email" value="" size="30"
                                aria-describedby="email-notes" aria-required="true" required="required">
                        </p>
                        <p class="comment-form-url">
                            <label for="url">Website</label><input id="url" name="url" type="url" value=""
                                size="30">
                        </p>
                        <p class="form-submit">
                            <input name="submit" type="submit" id="submit" class="submit"
                                value="Post Comment"><input type="hidden" name="comment_post_ID" value="90"
                                id="comment_post_ID">
                            <input type="hidden" name="comment_parent" id="comment_parent" value="0">
                        </p>
                        <noscript>
                        </noscript>
                    </form>
                </div>
                <!-- #respond -->
            </div>
            <!-- #comments -->
        </main>
        <!-- #main -->
    </div>
    <div id="secondary" class="column third">
        <div id="sidebar-1" class="widget-area" role="complementary">
            {{-- <aside id="text-5" class="widget widget_text">
                <h4 class="widget-title">About Me</h4>
                <div class="textwidget">
                    <p>
                        <img src="http://www.themepush.com/demo-hypnosa/wp-content/uploads/sites/9/2015/09/avatar5.png"
                            class="alignleft" style="width:80px;border-radius:50%;margin-bottom:0;"> I'm a
                        professional photographer for 10 years. It is a long established fact that a reader
                        will be distracted by the readable content of a page when looking at its layout.
                    </p>
                </div>
            </aside> --}}
            <aside id="recent-posts-2" class="widget widget_recent_entries">
                <h4 class="widget-title">Recent Posts</h4>
                <ul>
                    <li>
                        <a href="blog-single.html">Somewhere in time</a>
                    </li>
                    <li>
                        <a href="blog-single.html">Thanks for watching!</a>
                    </li>
                    <li>
                        <a href="blog-single.html/">Who could have thought?</a>
                    </li>
                    <li>
                        <a href="blog-single.html">Text Alignement</a>
                    </li>
                    <li>
                        <a href="blog-single.html">HTML Tags and Formatting</a>
                    </li>
                </ul>
            </aside>
            <aside id="text-6" class="widget widget_text">
                <h4 class="widget-title">Like us on Facebook</h4>
                <div class="textwidget">
                    <iframe
                        src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2Fwowthemesnet-562560840468823%2F&amp;tabs=timeline&amp;width=340&amp;height=380&amp;small_header=false&amp;adapt_container_width=true&amp;hide_cover=false&amp;show_facepile=false&amp;appId=365036103630036"
                        width="340" height="380" style="border:none;overflow:hidden" scrolling="no"
                        frameborder="0" allowtransparency="true">
                    </iframe>
                </div>
            </aside>
            {{-- <aside id="recent-comments-2" class="widget widget_recent_comments">
                <h4 class="widget-title">Recent Comments</h4>
                <ul id="recentcomments">
                    <li class="recentcomments"><span>ThemePush</span> on <a href="blog-single.html">Male
                            T-Shirt</a></li>
                    <li class="recentcomments"><span>ThemePush</span> on <a href="blog-single.html">Male
                            T-Shirt</a></li>
                    <li class="recentcomments"><span><a href="#" rel="external nofollow" class="url">Mr
                                WordPress</a></span> on <a href="blog-single.html">Thanks for watching!</a>
                    </li>
                    <li class="recentcomments"><span>Maria</span> on <a href="blog-single.html">Gray
                            Blouse</a></li>
                    <li class="recentcomments"><span>Maria</span> on <a href="blog-single.html">Retro
                            Dress</a></li>
                </ul>
            </aside> --}}
            {{-- <aside id="text-7" class="widget widget_text">
                <h4 class="widget-title">Follow us</h4>
                <div class="textwidget">
                    <!-- Place this tag in your head or just before your close body tag. -->
                    <script src="https://apis.google.com/js/platform.js" async="" defer=""
                        gapi_processed="true"></script>
                    <!-- Place this tag where you want the widget to render. -->
                    <div id="___page_0"
                        style="text-indent: 0px; margin: 0px; padding: 0px; border-style: none; float: none; line-height: normal; font-size: 1px; vertical-align: baseline; display: inline-block; width: 300px; height: 377px; background: transparent;">
                        <iframe frameborder="0" hspace="0" marginheight="0" marginwidth="0" scrolling="no"
                            style="position: static; top: 0px; width: 300px; margin: 0px; border-style: none; left: 0px; visibility: visible; height: 377px;"
                            tabindex="0" vspace="0" width="100%" id="I0_1460806394603"
                            name="I0_1460806394603"
                            src="https://apis.google.com/u/0/_/widget/render/page?usegapi=1&amp;href=%2F%2Fplus.google.com%2Fu%2F0%2F110916582192388695332&amp;rel=publisher&amp;origin=http%3A%2F%2Fwww.themepush.com&amp;gsrc=3p&amp;ic=1&amp;jsh=m%3B%2F_%2Fscs%2Fapps-static%2F_%2Fjs%2Fk%3Doz.gapi.en.5rbYCKK8ELg.O%2Fm%3D__features__%2Fam%3DAQ%2Frt%3Dj%2Fd%3D1%2Frs%3DAGLTcCNt4tfE4T2zmac5ke0V9FW49A3yCA#_methods=onPlusOne%2C_ready%2C_close%2C_open%2C_resizeMe%2C_renderstart%2Concircled%2Cdrefresh%2Cerefresh%2Conload&amp;id=I0_1460806394603&amp;parent=http%3A%2F%2Fwww.themepush.com&amp;pfname=&amp;rpctoken=19037393"
                            data-gapiattached="true" title="+Badge">
                        </iframe>
                    </div>
                </div>
            </aside> --}}
        </div>
        <!-- .widget-area -->
    </div>
    <!-- #secondary -->
</div>   
@endsection