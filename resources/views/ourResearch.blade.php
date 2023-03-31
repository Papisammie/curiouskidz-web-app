<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Curiouskidz</title>

     <!-- Google tag (gtag.js) -->
     <script async src="https://www.googletagmanager.com/gtag/js?id=G-HP1WG69GNP"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'G-HP1WG69GNP');
    </script>

    {{-- CSRF Token --}}
                <meta name="csrf-token" content="{{ csrf_token() }}">

        {{-- Scripts --}}
        <script>
            window.Laravel = {!! json_encode([
                'csrfToken' => csrf_token(),
            ]) !!};
        </script>

    <link rel="stylesheet" href="/cdn/css/themify-icons.css">

    <link rel="stylesheet" href="/cdn/css/feather.css">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="/curiouskidz.png">
    <!-- Custom Stylesheet -->
    <link rel="stylesheet" href="/cdn/css/style.css">

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.6/dist/sweetalert2.all.min.js"></script>
			<link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.min.css'>

</head>

<body class="color-theme-blue mont-font">

    <div class="preloader"></div>



  <!-- Logout modal -->

  <div class="modal bottom fade" style="overflow-y: scroll;" id="ModalLogout" tabindex="-1" role="dialog">
         <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content border-0">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><i class="ti-close text-grey-500"></i></button>
                <div class="modal-body p-3 d-flex align-items-center bg-none">
                    <div class="card shadow-none rounded-0 w-100 p-2 pt-3 border-0">
                        <div class="card-body rounded-0 text-left p-3">
                        <h2 class="fw-700 display1-size display2-md-size mb-4">Are you sure you want to logout?</h2>
                           
                           
                            <div class="col-sm-12 p-0 text-center mt-3 ">
                            <div class="form-group mb-1"> 
                              
                            <button class="btn btn-default" data-dismiss="modal">Cancel</button>
                            
                            <a href="{{ route('logout') }}" class="p-0 btn p-2 lh-24 w100 ml-1 ls-3 d-inline-block rounded-xl btn-danger font-xsssss fw-700 ls-lg text-white"
                                                            onclick="event.preventDefault();
                                                                          document.getElementById('logout-form').submit();">
                                      Log out</a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
                              </div>
                                
                               
                      
                            </div>
                        </div>
                    </div>                    
                </div>
            </div>
        </div>
    </div>



    <!-- Start Modal Guest -->
    <div class="modal bottom fade" style="overflow-y: scroll;" id="ModalGuest" tabindex="-1" role="dialog">
         <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content border-0">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><i class="ti-close text-grey-500"></i></button>
                <div class="modal-body p-3 d-flex align-items-center bg-none">
                    <div class="card shadow-none rounded-0 w-100 p-2 pt-3 border-0">
                        <div class="card-body rounded-0 text-left p-3">
                        <h2 class="fw-700 display1-size display2-md-size mb-4">Oops! You cant watch as a Guest </h2>
                           
                           
                            <div class="col-sm-12 p-0 text-center mt-3 ">
                                
                                <h6 class="mb-0 d-inline-block bg-white fw-600 font-xsss text-grey-500 mb-4"> Sign up to enjoy our platform</h6>
                                <!-- <div class="form-group mb-1"><a href="login.html#" class="form-control text-left style2-input text-white fw-600 bg-facebook border-0 p-0 mb-2"><img src="images/icon-1.png" alt="icon" class="ml-2 w40 mb-1 mr-5"> Sign in with Google</a></div> -->
                                <div class="form-group mb-1"><a href="/register" class="form-control text-left style2-input text-white fw-600 bg-twiiter border-0 p-0 "><center>Click to Sign Up</center></a></div>
                            </div>
                        </div>
                    </div>                    
                </div>
            </div>
        </div>
    </div>
     <!-- End Modal Guest -->

    @if (session('success'))
            <script type="text/javascript">
            Swal.fire(
              'Welcome {{Auth::user()->name}}!',
			  '{{ session('success') }}',
              'success'
            )
            </script>
        @endif


        @if (session('success_watch'))
            <script type="text/javascript">
            Swal.fire(
              'Hurray!!!',
			  '{{ session('success_watch') }}',
              'success'
            )
            </script>
        @endif

        @if (session('success_contact'))
            <script type="text/javascript">
            Swal.fire(
              'Notification!!!',
			  '{{ session('success_contact') }}',
              'success'
            )
            </script>
        @endif



        @if (session('error'))
        <script type="text/javascript">
            Swal.fire(
              'Error!',
              '{{ session('error') }}',
              'error'
            )
            </script>
        @endif

    <div class="main-wrap">
        <!-- header wrapper -->
        <div class="header-wrapper pt-3 pb-3 shadow-xss">
        <div class="container">
                <div class="row">
                    <div class="col-lg-8 navbar pt-0 pb-0">
                    <a href="/"><h1 class="fredoka-font ls-3 fw-700 text-current font-xxl">CuriousKidz <span class="d-block font-xsssss ls-1 text-grey-500 open-font ">Online Learning Course</span></h1></a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarNavDropdown">
                            <ul class="navbar-nav nav-menu float-none text-center">
                                <li class="nav-item dropdown"><a class="nav-link dropdown-toggle" href="/">Home </a></li>

                                <li class="nav-item"><a class="nav-link" href="/about/curiousKidz">About CuriousKidz</a></li>

                                <li class="nav-item"><a class="nav-link" href="/contact">Contact</a></li>
                            </ul>
                        </div>
                    </div>
                    @guest
                    <div class="col-lg-4 text-right d-lg-block d-none">
                        <a href="/login" class="header-btn bg-dark fw-500 text-white font-xssss p-2 lh-32 w100 text-center d-inline-block rounded-xl mt-1">Login</a>
                        <a href="/register" class="header-btn bg-current fw-500 text-white font-xssss p-2 lh-32 w100 text-center d-inline-block rounded-xl mt-1">Register</a>
                        
                       
                    </div>
                    @else

                    <div class="col-lg-4 text-right d-lg-block d-none">

                        <a href="/home" class="header-btn bg-dark fw-500 text-white font-xssss p-2 lh-32 w100 text-center d-inline-block rounded-xl mt-1"> Go to Home</a>
                        <a class="header-btn bg-current fw-500 text-white font-xssss p-2 lh-32 w100 text-center d-inline-block rounded-xl mt-1" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                         <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                          </form>
                      
                    </div>


                    @endguest
                </div>
            </div>
        </div>
        <!-- header wrapper -->

        <div class="about-wrapper pb-lg--7 pt-lg--7 pt-5 pb-7">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <h2 class="text-grey-900 fw-700 display1-size display2-md-size pb-2 mb-0 mt-3 d-block lh-3">ENHANCING EDUCATIONAL SYSTEMS</h2>
                        
                    </div>
                    <div class="col-lg-5 offset-lg-1">
                        <ul class="d-block list-inline float-right-md mb-3">
                        <li class="list-inline-item mr-1"><a href="/about/curiousKidz" class="ml-1 mr-1 rounded-lg text-primary font-xss border-size-md border-primary fw-600 open-font p-3 w200 btn md-mb-2 mt-3">About Us</a></li>
                      
                        <li class="list-inline-item mr-1"><a href="/about/faq" class="ml-1 mr-1 rounded-lg text-primary font-xss border-size-md border-primary fw-600 open-font p-3 w200 btn md-mb-2 mt-3">FAQ</a></li>
                        </ul>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 mt-3">
                        <img src="/about-page-hero.png" alt="about" class="img-fluid rounded-lg"></a>
                </div>
                    <div class="col-lg-12">
                      <br>
                        <h4 class=" fw-500 mb-4 lh-30 font-xsss text-black-500 mt-0"> Middle childhood development is probably the most important part of any child’s life experience. This is the stage where they start to recognize and understand other perspectives rather than their own basic understanding of their environment. The age between 6 and 12 is the window to insert view points and harness self directed learning. The children are heavily curious and emotionally charged, ready to explore, master skills, build friendships, self direct play, seek independence, build identity, make inquiry and create with impressive imagination. Information will be soaked up at every point while building cognitive and creative development. It is because of this we design specific line of thought to aid in directing their curiosity towards STEAM based careers.</h4>       
                        
                        <h4 class=" fw-500 mb-4 lh-30 font-xsss text-black-500 mt-0">Globally, children were more likely to watch video content and listen to music, than spend time on social media. However children in Nigeria are most active across internet communication media (referred to as social media/networks) in the region at 35 per cent with the most popular being Facebook, Google Mail, Twitter, WhatsApp and Instagram. This was then followed by video content and music at 29 per cent. The research revealed that children spent more time on YouTube– in particular, showing an increased interest in Netflix and o2tvseries.com for movies and series. <strong>– Kaspersky</strong></h4>    


                        <h4 class="fw-600 font-xs mt-5 mb-2"><i class="ti-check btn-round-xs text-white bg-success mr-2 border"></i>Children around the world spend 198 hours using computers for learning purposes.</h4>
                            

                        <h4 class="fw-600 font-xs mt-4 mb-2"><i class="ti-check btn-round-xs text-white bg-success mr-2 border"></i>Children around the world spend 2,026 hours using computers for passive media consumption.   <a href="https://curiouskidz.com.ng/about/our-research/#:~:text=Children%20around%20the%20world%20spend%202%2C026%20hours%20using%20computers%20for%20passive%20media%20consumption.%C2%A0%C2%A0%C2%A0%20Dr.%20J.C%20Horvath"> Dr. J.C Horvath</a></h4>
                            
                        
                        <h4 class=" fw-500 mb-4 lh-30 font-xsss text-black-500 mt-0"> The above data suggests a great deal of kids use computer tools primarily for consuming entertainment, and use very little amount to learn. They use even less amount of time to create. The learning function is totally driven by school and home work, meaning they are instructed and guided to do so. The question is “How do we get our children to purposefully spend more time using computers to research, create and produce instead of consuming digital products all the time?”</h4>  
                    </div>
                    
                  
                </div>
            </div>
        </div>
        
        
        
                <div class="how-to-work">
            <div class="container">
                <div class="row">
                     <div class="col-lg-5 mb-4"><img src="/pexels-artem-podrez-8518626.jpg" alt="image" class="rounded-lg img-fluid shadow-xs"></div>
                     <div class="col-lg-6 offset-lg-1 page-title style1">
                         <h2 class="fw-700 text-grey-800 display1-size display2-md-size lh-3 pt-lg--5">SOME TARGETED FIELDS OF DISCIPLINES</h2>

            
                     
                         <div style="width: 100%; display: table;">
                            <div style="display: table-row; height: 100px;">
                                <div style="width: 50%; display: table-cell;">
                            <h4 class="fw-600 font-xs mt-5 mb-2"><u>Arts & Humanities</u></h4>

                            <!--                         
                            <h4 class="fw-600 font-xs mt-5 mb-2"><i class="ti-check btn-round-xs text-white bg-success mr-2 border"></i>Music composition</h4> -->

                            <h4 class="fw-600 font-xs mt-5 mb-2"><i class="ti-check btn-round-xs text-white bg-success mr-2 border"></i>Story telling</h4>
                            

                            <h4 class="fw-600 font-xs mt-4 mb-2"><i class="ti-check btn-round-xs text-white bg-success mr-2 border"></i>Philosophy</h4>
                            

                            <h4 class="fw-600 font-xs mt-4 mb-2"><i class="ti-check btn-round-xs text-white bg-success mr-2 border"></i>History</h4>
                            
                            <h4 class="fw-600 font-xs mt-4 mb-2"><i class="ti-check btn-round-xs text-white bg-success mr-2 border"></i>Anthropology</h4>

                            <h4 class="fw-600 font-xs mt-4 mb-2"><i class="ti-check btn-round-xs text-white bg-success mr-2 border"></i>Psychology</h4>

                            <h4 class="fw-600 font-xs mt-4 mb-2"><i class="ti-check btn-round-xs text-white bg-success mr-2 border"></i>Film making</h4>

                            <h4 class="fw-600 font-xs mt-4 mb-2"><i class="ti-check btn-round-xs text-white bg-success mr-2 border"></i>Concept Art and Animation</h4>

                            <h4 class="fw-600 font-xs mt-4 mb-2"><i class="ti-check btn-round-xs text-white bg-success mr-2 border"></i>Music composition </h4>

                        

                            <h4 class="fw-600 font-xs mt-4 mb-2"><i class="ti-check btn-round-xs text-white bg-success mr-2 border"></i>Aesthetic design</h4>
                        </div>



                        <div style="display: table-cell;"> 

                         <h4 class="fw-600 font-xs mt-5 mb-2"><u>Sciences</u></h4>

<!--                         
                         <h4 class="fw-600 font-xs mt-5 mb-2"><i class="ti-check btn-round-xs text-white bg-success mr-2 border"></i>Music composition</h4> -->

                         <h4 class="fw-600 font-xs mt-5 mb-2"><i class="ti-check btn-round-xs text-white bg-success mr-2 border"></i>Astronomy & Cosmology</h4>
                        

                         <h4 class="fw-600 font-xs mt-4 mb-2"><i class="ti-check btn-round-xs text-white bg-success mr-2 border"></i>Nano-Tech, Robotics & Bionics</h4>
                        

                         <h4 class="fw-600 font-xs mt-4 mb-2"><i class="ti-check btn-round-xs text-white bg-success mr-2 border"></i>Aerospace</h4>
                         
                         <h4 class="fw-600 font-xs mt-4 mb-2"><i class="ti-check btn-round-xs text-white bg-success mr-2 border"></i>Computer programming</h4>

                         <h4 class="fw-600 font-xs mt-4 mb-2"><i class="ti-check btn-round-xs text-white bg-success mr-2 border"></i>Artificial Intelligence & Data Science</h4>

                         <h4 class="fw-600 font-xs mt-4 mb-2"><i class="ti-check btn-round-xs text-white bg-success mr-2 border"></i>Engineering</h4>

                         <h4 class="fw-600 font-xs mt-4 mb-2"><i class="ti-check btn-round-xs text-white bg-success mr-2 border"></i>Geo-Sciences</h4>

                         <h4 class="fw-600 font-xs mt-4 mb-2"><i class="ti-check btn-round-xs text-white bg-success mr-2 border"></i>Hydroponics </h4>

                      

                         <h4 class="fw-600 font-xs mt-4 mb-2"><i class="ti-check btn-round-xs text-white bg-success mr-2 border"></i>Systems theory</h4>
                         </div>
                     
                         </div>
            </div>
                </div>
            </div>
        </div>
        </div>




        <div class="about-wrapper pb-lg--7 pt-lg--7 pt-5 pb-7">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <h2 class="text-grey-900 fw-700 display1-size display2-md-size pb-2 mb-0 mt-3 d-block lh-3">Reasons students<br> learn better with video</h2>
                        
                    </div>
              
               
                    <div class="col-lg-12">
                    
                        <h4 class=" fw-500 mb-4 lh-30 font-xsss text-black-500 mt-0">There is a new mantra in e-learning, and it is called “show, don’t tell”. Over the past few years, videos are being widely used in classrooms for supporting a teacher’s curriculum and helping students learn the material faster than ever. Research shows that 94% of the teachers around the world have effectively used videos during the academic year and they have found video learning quite effective, it is even better than teaching students through traditional text-books.

                        <p>Check out 7 different ways students learn with videos effectively and quick:</p></h4>       
                        
                        <h4 class=" fw-500 mb-4 lh-30 font-xsss text-black-500 mt-0"> <b>1. Visual Processing:</b>
                        Majority of part of the human brain is devoted towards processing the visual information. Brain responds to visuals fast, better than text or any other kind of learning material. Remembering stuff from the picture is retained in the mind for a longer time. Through videos, students get to process information fast.</h4>    


                        <h4 class=" fw-500 mb-4 lh-30 font-xsss text-black-500 mt-0"> <b>2. Videos just like animation tell story about how a particular process occurs. There is no reading, it is all watching. Abstract concepts that are difficult to understand in any other way are learned by watching people perform or demonstrate the process. This demonstration makes learning fast.</h4>    
                        
                        <h4 class=" fw-500 mb-4 lh-30 font-xsss text-black-500 mt-0"> <b>3.Self-Study:</b>
                        Through videos, anybody can do self-study. The videos, audios and webinars help students to learn something for which a teacher would be required otherwise. The best part is, this self-study technique leaves a powerful impact on the brain, which might even be better than reading the same lesson from a book.</h4>   

                        <h4 class=" fw-500 mb-4 lh-30 font-xsss text-black-500 mt-0"> <b>4.Classroom Learning:</b>
                        Videos have now become a dominant part of classroom learning. They are widely used in both physical and online classrooms. This type of classroom learning is also called distant learning where students throughout the country interact with each other and collaborate with each other while learning.</h4>   

                        <h4 class=" fw-500 mb-4 lh-30 font-xsss text-black-500 mt-0"> <b>5.On the Job Training:</b>
                        Instead of telling how a particular task is to be performed, students are instructed through videos about how they are required to perform a particular task, just to make sure he is doing it correctly. Students are learning through videos to perform the tasks intended for them.</h4>   

                        <h4 class=" fw-500 mb-4 lh-30 font-xsss text-black-500 mt-0"> <b>6.Contextualization:</b>
                        As videos give power to make a visual representation of the real world, this form of contextualization is incredibility useful in converting the abstract theories into visuals. The students get to develop a connection between the knowledge that is being transferred and its practical implementation.</h4>   


                        <h4 class=" fw-500 mb-4 lh-30 font-xsss text-black-500 mt-0"> <b>7.Illustration:</b>
                        There can be no better way of illustration than using videos to define what you wish to define. Students get to learn through illustration. The visual analogy clarifies the concept better than any other thing.
                        Video learning is better than book learning. </h4>   

                        <p>Video learning creates a sense of presence which supports the cognitive as well a social presence. All these components are critical for successful learning. This type of learning is not possible from merely reading or learning through books. Now videos have been recognized as a powerful tool for learning in classrooms. Lectures are conducted using video tutorials to make the learning process fun, effective,
                        responsive and fruitful. That’s why even students look for videos to do self-study without asking for anyone’s help.</p>

                    </div>
                    </div>
                  
                </div>
            </div>
        </div>



        <div class="about-wrapper pb-lg--7 pt-lg--7 pt-5 pb-7">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        
                        
                         <h4 class="text-grey-900 fw-700 display1-size display2-md-size pb-2 mb-0 mt-3 d-block lh-3"><quote>“Memory is a residue of thought”</quote></h4><br><br>
                        
                        
                        <h4 class="text-grey-900 fw-700">Daniel Willingham</h4><br>
                        
                        <h3><b>FOCUS IS DIRECTED TOWARDS THESE AND MORE</b></h3>
                        
                        
                        
                    </div>
              
                    

                    <div class="col-lg-12">
                    
          
                        
                        <h4 class=" fw-500 mb-4 lh-30 font-xsss text-black-500 mt-0"> <b>GEO-SCIENCES AND MINERALS</b><br>
                        Earth science is the first discipline in target. This line of study is included to give a beginners guide to the earth and its resources. This course inform the students about the systems that sustains the earth, it’s mass, orbit, rotation, atmospherics, resources and the various uses of these materials in line with global warming & climate agenda.
                            Climate – Air/Water/Earth – Atoms/Molecules – Chemical elements – Rare minerals – Mining/Asteroids</h4>    


                        <h4 class=" fw-500 mb-4 lh-30 font-xsss text-black-500 mt-0"> <b>MUSIC</b><br> Music ignites all area of child development and skills for school readiness: Intellectual, social & emotional, motor, language and overall literacy. It helps the body and the mind work together. Exposing children to music help build unique connections between different parts of the brain and makes the brain more adaptable giving it a mental workout. We know music is in normal school curriculum but we need children to stay with skills learned like playing instruments throughout their lives.
                        Dance – World Music – Music Instrument – Music Composition – Orchestra works – Playing Instruments.</h4>    
                        
                        <h4 class=" fw-500 mb-4 lh-30 font-xsss text-black-500 mt-0"> <b>LIFESCIENCE AND BIOSCIENCE</b><br>
                        The children’s introduction to this line of discipline is designed to guide their curiosity and interests towards the industries of pharmaceuticals, virology, genetic research and application in the medical field. These industries are expected to keep thriving as new discoveries are made for healthcare development and other uses.
Plant & Animals – Biodiversity – Ecosystems – Microbes – Genes & Cells – Gene Editing</h4>   

                        <h4 class=" fw-500 mb-4 lh-30 font-xsss text-black-500 mt-0"> <b>LITERATURE (Art of written communication)</b><br>
                        Communications and cognitive skills can be enhanced by reading and writing, though children will be taught this in normal English class. These videos are chosen to push their interest in written words to the next level. Children can enjoy reading and writing if they can make sufficient emotional investment in the practice. They have always enjoyed stories in movies and comics. They could enjoy the creative act of telling their own with all the imagination they can muster. As they get older their written works will mature and they will enjoy every moment of it.
Story telling – Story development – World building – Play write & Poetry – Screenwriting – Philosophy</h4>   

                        <h4 class=" fw-500 mb-4 lh-30 font-xsss text-black-500 mt-0"> <b>ASTRONOMY</b>
                        This line of course is added to aid the desire for exploration. Curiosity can be wasted if children have nothing to explore. Granted the earth is big and full of wonders, the universe is bigger and its secrets are yet to be uncovered and understood. If the future requires space explorations like the Mars Mission, our children could be a part of it if they work hard and push in the direction. This is to spark interest in the field and guide their curiosity towards the wonders of the universe.
Earth – Space – Solar Systems – Constellations – Galaxies – Mars Mission & Space Exploration</h4>   

                        <h4 class=" fw-500 mb-4 lh-30 font-xsss text-black-500 mt-0"> <b>VISUAL ART</b><br>
                        Fine art is normally taught in school as part of conventional curriculum but usually only the naturally talented carry on this skill into their future. The artistic expression and creativity is innate in our children, some of them may just need more practice than the naturally talented children. This skill can be useful for technical drawings and designs of innovative concepts for prototype development. We believe we can get our children to enjoy the practice till they get very good at it.
Drawing – Painting – Comic art – Concept art – Animation – Architecture</h4>   


                        <h4 class=" fw-500 mb-4 lh-30 font-xsss text-black-500 mt-0"> <b>COMPUTER SCIENCES</b><br>
                        Computers have become one of the most important and invaluable creation of man. This little piece of machinery is an extension of our very selves aiding in enhancement of our capabilities in problem solving. One thing all computer scientists will agree on is that computer programming can be very boring work. We believe we can push the children’s emotional investment in the boring work to spark interest for the craft.
The Tool – Sim City – Game Development – Data & Blockchain – Apps, Algorithms & A.I - Metaverse</h4>  


                        <h4 class=" fw-500 mb-4 lh-30 font-xsss text-black-500 mt-0"> <b>HISTORY</b><br>
                        The inclusion of this discipline is to help our children establish roots at home and anywhere they may go. Knowing the story of the world aids understanding and tolerance, build healthier relationships and organised a more complex mental structure. The story of all that has happen through human civilizations can shift perspectives into higher levels of understanding.
World Basics – Mesopotamia – Asia – Europe – Americas – Africa/Heroes</h4>  

                        <h4 class=" fw-500 mb-4 lh-30 font-xsss text-black-500 mt-0"> <b>ENGINEERING & CRAFTSMANSHIP</b><br>
                        The skills and craftsmanship required for design and development is sharpened in this practice. Problem analysis and problem solving is mostly responsible for every kind of technology that has been built in history and will continue to be so. Driving our children’s understanding of the practice at an early stage of development is very important to ensure they can compete with their peers in developed societies.
Engineering Method – Systems Thinking – City Design – Material Science – Marine & Aerospace – Nano-Tech, Robotics & Bionics</h4>  

<h4 class=" fw-500 mb-4 lh-30 font-xsss text-black-500 mt-0"> <b>GENERAL KNOWLEDGE & CIVILIZATION STRUCTURES</b><br>
The inclusion of this piece is to aid an early understanding of mankind and its achievements. Interest in this discipline is important to build future leaders of industries and nations. The responsibility that power carries is vital to understand if great nations or enterprises need to be built.
7 Wonders of the World – Language – Societies – Religion & Myths – Leadership, Law & Enterprise</h4>  


                       

                    </div>
                    </div>
                  
                </div>
            </div>
        </div>


   


    <!-- footer wrapper -->
        <div class="footer-wrapper layer-after bg-dark mt-0">
            <div class="container">
                <div class="row">
                    <!--<div class="col-sm-12 text-left">-->
                    <!--    <h4 class="mb-4 text-grey-300 fw-300 font-xl open-font lh-3 d-inline-block">We are digital agency, a small design agency based in paris as i was groping to remove the chain from about my victim’s neck only through language.</h4>-->
                    <!--</div>-->
                    <div class="col-sm-6 text-left">
                        <ul class="d-flex align-items-center mt-2 float-left xs-mb-2">
                            <li class="mr-2"><a href="https://www.facebook.com/profile.php?id=100084077277628&mibextid=LQQJ4d" class="btn-round-md bg-facebook"><i class="font-xs ti-facebook text-white"></i></a></li>
                           
                            <!--<li class="mr-2"><a href="javascript:void(0)" class="btn-round-md bg-linkedin"><i class="font-xs ti-linkedin text-white"></i></a></li>-->
                            <li class="mr-2"><a href="https://instagram.com/curiouskidzng?igshid=YWJhMjlhZTc=" class="btn-round-md bg-instagram"><i class="font-xs ti-instagram text-white"></i></a></li>
                            <!--<li class="mr-2"><a href="javascript:void(0)" class="btn-round-md bg-pinterest"><i class="font-xs ti-pinterest text-white"></i></a></li>-->
                        </ul>
                    </div>
                    <div class="col-sm-5 offset-sm-1 text-right">
                        <form action="{{url('activate/newsletter')}}" class="mt-2" method="post">
                                @csrf

                                <input type="text" name="email" required autofocus class="form-control mb-2 bg-greylight border-0 style1-input pl-5" placeholder="Email address">
                                        @if ($errors->has('email'))
                                            <span class="invalid-feedback">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                        @endif
                   
                            <button type="submit">Submit</button>
                        </form>                    
                    </div>
                   

                    <div class="col-sm-12 lower-footer"></div>
                    <div class="col-sm-6">
                        <p class="copyright-text">© {{date('Y')}} copyright. All rights reserved.</p>
                    </div>
                    <div class="col-sm-6 text-right">
                        <p class="float-right copyright-text">In case of any concern, <a href="/contact">contact us</a></p>
                    </div>
                </div>
            </div>
        </div>
        <!-- footer wrapper -->

    </div> 

     <!-- Modal Video -->
    <!-- <div class="modal bottom fade" id="Modalvideo" tabindex="-1" role="dialog">
         <div class="modal-dialog video-wrap modal-dialog-centered" role="document">
            <div class="modal-content border-0">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><i class="ti-close text-grey-500"></i></button>
                <div class="modal-body p-3 d-flex align-items-center bg-none">
                    <div class="embed-responsive embed-responsive-16by9">
                      <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/zpOULjyy-n8?rel=0"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div> -->



    <script src="/cdn/js/plugin.js"></script>
    <script src="/cdn/js/scripts.js"></script>
    
</body>

</html>