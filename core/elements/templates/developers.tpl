<!DOCTYPE html>
<html lang="en">
  [[$head? &css=`developers`]]

  <body>
    <div class="wrapper wrapper_developers">
      [[$header]]

      <main>
        <!-- section 1 -->
        <div
          class="position-absolute mb-5 bottom-0 start-50 translate-middle-x"
          style="z-index: 300"
          section_1V
        >
          <a class="scroll p-5 text-dark" href="[[~[[*id]]]]#experience"
            ><i class="bi bi-chevron-double-down" style="font-size: 3rem"></i
          ></a>
        </div>

        <section
          id="site-start"
          class="first-section d-none d-md-flex text-dark d-flex min-vh-100 position-relative align-items-center"
          style="
            z-index: -2;
            background-image: url('/assets/theme/build/img/developers/section-1.jpg');
            background-size: cover;
            background-position: center;
          "
        >
          <div class="container-fluid">
            <div class="row mx-md-5 pb-4">
              <div
                class="col-md-6 text-center mx-auto position-fixed translate-middle top-50 start-50"
                style="z-index: -1"
              >
                <h2>
                  We work with boutique developers, architects, and interior
                  designers to deliver stunning bespoke kitchens and bedrooms
                  for your development.
                </h2>
              </div>
            </div>
          </div>
        </section>

        <!-- For smaller devices -->
        <section
          id="site-start-alt"
          class="d-md-none text-dark d-flex min-vh-100 position-relative align-items-center"
          style="
            z-index: -2;
            background-image: url('/assets/theme/build/img/developers/section-1.jpg');
            background-size: cover;
            background-position: center;
          "
        >
          <div class="container-fluid">
            <div class="row mx-md-5 pb-4">
              <div
                class="col-md-6 text-center mx-auto position-fixed translate-middle top-50 start-50"
                style="z-index: -1"
              >
                <h2>
                  We work with boutique developers, architects, and interior
                  designers to deliver stunning bespoke kitchens and bedrooms
                  for your development.
                </h2>
              </div>
            </div>
          </div>
        </section>
        <!-- End -->

        <!-- section 2 -->
        <section
          id="experience"
          class="text-light min-vh-100 scroll-md-bg position-relative"
          style="
            background-image: url('/assets/theme/build/img/developers/section-2.jpg');
            background-size: cover;
            background-position: center;
          "
        >
          <div
            class="position-absolute mb-5 bottom-0 start-50 translate-middle-x col-md-8 col-12"
            style="z-index: 300"
          >
            <div class="container-fluid">
              <div class="row mx-md-5 pb-4">
                <div class="col-md-12 text-center mx-auto text-dark">
                  <h2 class="pb-4">
                    We have a wealth of experience in delivering projects of all
                    sizes and our unique approach means you are fully supported
                    throughout the process.
                  </h2>
                  <a
                    class="scroll p-5 text-dark"
                    href="[[~[[*id]]]]#more-than-a-kitchen"
                    ><i
                      class="bi bi-chevron-double-down"
                      style="font-size: 3rem"
                    ></i
                  ></a>
                </div>
              </div>
            </div>
          </div>
        </section>
        <!-- End -->

        <!-- section 3 -->
        <section
          id="more-than-a-kitchen"
          class="text-light d-flex min-vh-100 scroll-md-bg align-items-center position-relative"
          style="
            background-image: url('/assets/theme/build/img/developers/section-3.jpg');
            background-size: cover;
            background-position: center;
          "
        >
          <div
            class="position-absolute mb-5 bottom-0 start-50 translate-middle-x"
            style="z-index: 300"
          >
            <a class="scroll p-5 text-dark" href="[[~[[*id]]]]#design"
              ><i class="bi bi-chevron-double-down" style="font-size: 3rem"></i
            ></a>
          </div>
          <div class="container-fluid">
            <div class="row mx-md-5 pb-4">
              <div class="col-md-8 text-center mx-auto text-dark">
                <h1>At Urban Myth we deliver<br />more than a kitchen.</h1>
              </div>
            </div>
          </div>
        </section>
        <!-- End -->

        <!-- section 4 -->
        <section
          id="design"
          class="d-flex align-items-center min-vh-100 bg-dark text-light position-relative"
        >
          <div
            class="position-absolute mb-2 bottom-0 start-50 translate-middle-x"
            style="z-index: 300"
          >
            <a class="scroll p-5 text-light" href="[[~[[*id]]]]#planning"
              ><i class="bi bi-chevron-double-down" style="font-size: 3rem"></i
            ></a>
          </div>
          <div class="container-fluid my-5">
            <div class="row mx-md-5 pb-4 justify-content-between">
              <div class="col order-md-2">
                <a
                  href="[[~[[*id]]]]#partners"
                  class="float-end btn btn-outline-light"
                  >CONTACT</a
                >
              </div>
              <div class="col-md-8">
                <h1>Interior Design</h1>
                <h2>Bespoke design to inspire</h2>
                <p>
                  When you engage us at the beginning of your project, our
                  experienced design team will profile your potential customers
                  and propose an appealing design scheme that meets the needs of
                  their lifestyle. Whether we are adding personality to a new
                  build or complementing the features of a period property, our
                  focus remains on creating a desirable space, on time and on
                  budget.
                </p>
              </div>
            </div>

            <!-- <div class="row d-md-none">
              <div class="col-6">
                [[getImageList? &tvname=`Projects` &tpl=`more_project`
                &limit=`6`]]
              </div>
              <div class="col-6">
                [[getImageList? &tvname=`Projects` &tpl=`more_project`
                &offset=`6` &limit=`6`]]
              </div>
            </div> -->
            <div
              id="carouselExampleControls"
              class="d-none d-md-block carousel slide px-2"
              data-bs-interval="false"
            >
              <div class="carousel-indicators mb-md-0">
                <button
                  type="button"
                  data-bs-target="#carouselExampleIndicators"
                  data-bs-slide-to="0"
                  class="active"
                  aria-current="true"
                  aria-label="Slide 1"
                ></button>
                <button
                  type="button"
                  data-bs-target="#carouselExampleIndicators"
                  data-bs-slide-to="1"
                  aria-label="Slide 2"
                ></button>
              </div>
              <div class="carousel-inner">
                <div class="carousel-item active">
                  <div class="row mx-md-5">
                    <div class="col-md-4 col-4">
                      <!-- [[getImageList? &tvname=`Projects` &tpl=`more_project` &limit=`2`]] -->

                      <div class="project h-auto position-relative">
                        <a
                          href="more/more.html#project1"
                          data-bs-target="#project1"
                          data-bs-toggle="modal"
                          data-bs-backdrop="static"
                          data-keyboard="false"
                        >
                          <img
                            src="/assets/theme/build/img/developers/slider-image-1.jpg"
                            alt="[[+title]]"
                            class="img-fluid mb-md-4 mb-4"
                            loading="lazy"
                          />
                          <div class="position-absolute top-0 end-0 m-1">
                            <img
                              src="/assets/theme/build/img/developers/slider-open.svg"
                              alt=""
                            />
                          </div>
                        </a>
                      </div>
                      <div class="project h-auto position-relative">
                        <a
                          href="more/more.html#project2"
                          data-bs-target="#project2"
                          data-bs-toggle="modal"
                          data-bs-backdrop="static"
                          data-keyboard="false"
                        >
                          <img
                            src="/assets/theme/build/img/developers/slider-image-2.jpg"
                            alt="[[+title]]"
                            class="img-fluid mb-md-4 mb-4"
                            loading="lazy"
                          />
                          <div class="position-absolute top-0 end-0 m-1">
                            <img
                              src="/assets/theme/build/img/developers/slider-open.svg"
                              alt=""
                            />
                          </div>
                        </a>
                      </div>
                    </div>
                    <div class="col-md-3 col-4">
                      <!-- [[getImageList? &tvname=`Projects` &tpl=`more_project` &offset=`2` &limit=`2`]] -->
                      <div class="project h-auto position-relative">
                        <a
                          href="more/more.html#project3"
                          data-bs-target="#project3"
                          data-bs-toggle="modal"
                          data-bs-backdrop="static"
                          data-keyboard="false"
                        >
                          <img
                            src="/assets/theme/build/img/developers/slider-image-3.jpg"
                            alt="[[+title]]"
                            class="img-fluid mb-md-4 mb-4"
                            loading="lazy"
                          />
                          <div class="position-absolute top-0 end-0 m-1">
                            <img
                              src="/assets/theme/build/img/developers/slider-open.svg"
                              alt=""
                            />
                          </div>
                        </a>
                      </div>
                      <div class="project h-auto position-relative">
                        <a
                          href="more/more.html#project4"
                          data-bs-target="#project4"
                          data-bs-toggle="modal"
                          data-bs-backdrop="static"
                          data-keyboard="false"
                        >
                          <img
                            src="/assets/theme/build/img/developers/slider-image-4.jpg"
                            alt="[[+title]]"
                            class="img-fluid mb-md-4 mb-4"
                            loading="lazy"
                          />
                          <div class="position-absolute top-0 end-0 m-1">
                            <img
                              src="/assets/theme/build/img/developers/slider-open.svg"
                              alt=""
                            />
                          </div>
                        </a>
                      </div>
                    </div>
                    <div class="col-md-5 col-4">
                      <!-- [[getImageList? &tvname=`Projects` &tpl=`more_project`
                      &offset=`4` &limit=`1`]] -->
                      <div class="project h-auto position-relative">
                        <a
                          href="more/more.html#project5"
                          data-bs-target="#project5"
                          data-bs-toggle="modal"
                          data-bs-backdrop="static"
                          data-keyboard="false"
                        >
                          <img
                            src="/assets/theme/build/img/developers/slider-image-5.jpg"
                            alt="[[+title]]"
                            class="img-fluid mb-md-4 mb-4"
                            loading="lazy"
                          />
                          <div class="position-absolute top-0 end-0 m-1">
                            <img
                              src="/assets/theme/build/img/developers/slider-open.svg"
                              alt=""
                            />
                          </div>
                        </a>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="carousel-item">
                  <div class="row mx-md-5">
                    <div class="col-md-3 col-4">
                      <!-- [[getImageList? &tvname=`Projects` &tpl=`more_project` &offset=`5` &limit=`2`]] -->
                      <div class="project h-auto position-relative">
                        <a
                          href="more/more.html#project6"
                          data-bs-target="#project6"
                          data-bs-toggle="modal"
                          data-bs-backdrop="static"
                          data-keyboard="false"
                        >
                          <img
                            src="/assets/theme/build/img/developers/slider-image-6.jpg"
                            alt="[[+title]]"
                            class="img-fluid mb-md-4 mb-4"
                            loading="lazy"
                          />
                          <div class="position-absolute top-0 end-0 m-1">
                            <img
                              src="/assets/theme/build/img/developers/slider-open.svg"
                              alt=""
                            />
                          </div>
                        </a>
                      </div>
                      <div class="project h-auto position-relative">
                        <a
                          href="more/more.html#project7"
                          data-bs-target="#project7"
                          data-bs-toggle="modal"
                          data-bs-backdrop="static"
                          data-keyboard="false"
                        >
                          <img
                            src="/assets/theme/build/img/developers/slider-image-7.jpg"
                            alt="[[+title]]"
                            class="img-fluid mb-md-4 mb-4"
                            loading="lazy"
                          />
                          <div class="position-absolute top-0 end-0 m-1">
                            <img
                              src="/assets/theme/build/img/developers/slider-open.svg"
                              alt=""
                            />
                          </div>
                        </a>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <!-- [[getImageList? &tvname=`Projects` &tpl=`more_project` &offset=`7` &limit=`2`]] -->
                      <div class="project h-auto position-relative">
                        <a
                          href="more/more.html#project8"
                          data-bs-target="#project8"
                          data-bs-toggle="modal"
                          data-bs-backdrop="static"
                          data-keyboard="false"
                        >
                          <img
                            src="/assets/theme/build/img/developers/slider-image-8.jpg"
                            alt="[[+title]]"
                            class="img-fluid mb-md-4 mb-4"
                            loading="lazy"
                          />
                          <div class="position-absolute top-0 end-0 m-1">
                            <img
                              src="/assets/theme/build/img/developers/slider-open.svg"
                              alt=""
                            />
                          </div>
                        </a>
                      </div>
                      <div class="project h-auto position-relative">
                        <a
                          href="more/more.html#project9"
                          data-bs-target="#project9"
                          data-bs-toggle="modal"
                          data-bs-backdrop="static"
                          data-keyboard="false"
                        >
                          <img
                            src="/assets/theme/build/img/developers/slider-image-9.jpg"
                            alt="[[+title]]"
                            class="img-fluid mb-md-4 mb-4"
                            loading="lazy"
                          />
                          <div class="position-absolute top-0 end-0 m-1">
                            <img
                              src="/assets/theme/build/img/developers/slider-open.svg"
                              alt=""
                            />
                          </div>
                        </a>
                      </div>
                    </div>
                    <div class="col-md-3 col-4">
                      <!-- [[getImageList? &tvname=`Projects` &tpl=`more_project` &offset=`9` &limit=`1`]] -->
                      <div class="project h-auto position-relative">
                        <a
                          href="more/more.html#project10"
                          data-bs-target="#project10"
                          data-bs-toggle="modal"
                          data-bs-backdrop="static"
                          data-keyboard="false"
                        >
                          <img
                            src="/assets/theme/build/img/developers/slider-image-10.jpg"
                            alt="[[+title]]"
                            class="img-fluid mb-md-4 mb-4"
                            loading="lazy"
                          />
                          <div class="position-absolute top-0 end-0 m-1">
                            <img
                              src="/assets/theme/build/img/developers/slider-open.svg"
                              alt=""
                            />
                          </div>
                        </a>
                      </div>
                    </div>
                    <div class="col-md-2 col-4">
                      <!-- [[getImageList? &tvname=`Projects` &tpl=`more_project` &offset=`10` &limit=`2`]] -->
                      <div class="project h-auto position-relative">
                        <a
                          href="more/more.html#project11"
                          data-bs-target="#project11"
                          data-bs-toggle="modal"
                          data-bs-backdrop="static"
                          data-keyboard="false"
                        >
                          <img
                            src="/assets/theme/build/img/developers/slider-image-11.jpg"
                            alt="[[+title]]"
                            class="img-fluid mb-md-4 mb-4"
                            loading="lazy"
                          />
                          <div class="position-absolute top-0 end-0 m-1">
                            <img
                              src="/assets/theme/build/img/developers/slider-open.svg"
                              alt=""
                            />
                          </div>
                        </a>
                      </div>
                      <div class="project h-auto position-relative">
                        <a
                          href="more/more.html#project12"
                          data-bs-target="#project12"
                          data-bs-toggle="modal"
                          data-bs-backdrop="static"
                          data-keyboard="false"
                        >
                          <img
                            src="/assets/theme/build/img/developers/slider-image-12.jpg"
                            alt="[[+title]]"
                            class="img-fluid mb-md-4 mb-4"
                            loading="lazy"
                          />
                          <div class="position-absolute top-0 end-0 m-1">
                            <img
                              src="/assets/theme/build/img/developers/slider-open.svg"
                              alt=""
                            />
                          </div>
                        </a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <button
                class="carousel-control-prev"
                style="width: auto"
                type="button"
                data-bs-target="#carouselExampleControls"
                data-bs-slide="prev"
              >
                <span
                  class="carousel-control-prev-icon"
                  aria-hidden="true"
                ></span>
                <span class="visually-hidden">Previous</span>
              </button>
              <button
                class="carousel-control-next"
                style="width: auto"
                type="button"
                data-bs-target="#carouselExampleControls"
                data-bs-slide="next"
              >
                <span
                  class="carousel-control-next-icon"
                  aria-hidden="true"
                ></span>
                <span class="visually-hidden">Next</span>
              </button>
            </div>
          </div>
        </section>

        <!-- Start Modals -->
        <!-- Modals 100 Putney Common -->
        <div
          class="modal fade"
          id="project1"
          tabindex="-1"
          aria-labelledby="100 Putney Common"
          aria-hidden="true"
        >
          <div class="modal-dialog modal-fullscreen bg-white text-dark">
            <div class="modal-content d-flex p-0">
              <div class="position-absolute top-0 start-0">
                <button
                  type="button"
                  class="btn-close p-3"
                  data-bs-dismiss="modal"
                  aria-label="Close"
                ></button>
              </div>

              <div class="container-fluid p-md-0">
                <div class="row m-0 align-items-center">
                  <div
                    class="col-md-5 p-0 py-5 ps-md-2 pe-md-5 offset-md-1 align-self-center"
                  >
                    <h1>100 Putney Common</h1>
                    <h2>Durkan Homes</h2>
                    <p>
                      The former Putney Hospital site has been transformed into
                      a selection of 24 contemporary apartments. Built over four
                      floors, each apartment is fitted to the highest
                      specification featuring our handle-less kitchens and
                      appliances from leading brands, Siemens, Bosch, Blanco and
                      Falmec.
                    </p>

                    <div class="row pb-4">
                      <div class="col-6">
                        <img
                          src="assets\theme\build\img\developers\modals\putney_1.jpg"
                          class="img-fluid p-2"
                          alt="100 Putney Common Kitchen "
                          loading="lazy"
                        />
                      </div>
                      <div class="col-6">
                        <img
                          src="assets\theme\build\img\developers\modals\putney_2.jpg"
                          class="img-fluid p-2"
                          alt="100 Putney Common Kitchen"
                          loading="lazy"
                        />
                      </div>
                    </div>
                    <h3 class="pt-3 text-muted fs-4"></h3>
                    <p><small></small></p>
                    <a href="" target="_blank" class="btn btn-outline-dark"
                      >CASE STUDY</a
                    >
                  </div>
                  <div class="col-md-6 vh-100 position-relative">
                    <img
                      src="assets\theme\build\img\developers\modals\100putney_internal.jpg"
                      class="modal-img"
                      alt="100 Putney Common Kitchen"
                      loading="lazy"
                    />
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- End Modals -->
        <!-- Modals Broom Hill -->
        <div
          class="modal fade"
          id="project2"
          tabindex="-1"
          aria-labelledby="Broom Hill"
          aria-hidden="true"
        >
          <div class="modal-dialog modal-fullscreen bg-white text-dark">
            <div class="modal-content d-flex p-0">
              <div class="position-absolute top-0 start-0">
                <button
                  type="button"
                  class="btn-close p-3"
                  data-bs-dismiss="modal"
                  aria-label="Close"
                ></button>
              </div>

              <div class="container-fluid p-md-0">
                <div class="row m-0 align-items-center">
                  <div
                    class="col-md-5 p-0 py-5 ps-md-2 pe-md-5 offset-md-1 align-self-center"
                  >
                    <h1>Broom Hill</h1>
                    <h2>Bertroy Homes</h2>
                    <p>
                      We were delighted to design, manufacture, and install the
                      bespoke kitchens and fitted wardrobes for both of these
                      stunning four bedroom new build detached houses situated
                      in the sought after ‘Oaklands’ area of Welwyn,
                      Hertfordshire.
                    </p>

                    <div class="row pb-4">
                      <div class="col-6">
                        <img
                          src="assets\theme\build\img\developers\modals\broom_hill_in.jpg"
                          class="img-fluid p-2"
                          alt="Broom Hill Kitchen "
                          loading="lazy"
                        />
                      </div>
                      <div class="col-6">
                        <img
                          src="assets\theme\build\img\developers\modals\broom_hill_in_2.jpg"
                          class="img-fluid p-2"
                          alt="Broom Hill Kitchen"
                          loading="lazy"
                        />
                      </div>
                    </div>
                    <h3 class="pt-3 text-muted fs-4">
                      "We chose Urban Myth for our development at Broom Hill as
                      they offer a wide range of colour options and deal with
                      the install from start to finish. The kitchens are high
                      quality, and the team are easy to deal with, we would
                      highly recommend them"
                    </h3>
                    <p><small>Bertroy Homes</small></p>
                    <a href="" target="_blank" class="btn btn-outline-dark"
                      >CASE STUDY</a
                    >
                  </div>
                  <div class="col-md-6 vh-100 position-relative">
                    <img
                      src="assets\theme\build\img\developers\modals\broom_hill_hero.jpg"
                      class="modal-img"
                      alt="Broom Hill Kitchen"
                      loading="lazy"
                    />
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- End Modals -->
        <!-- Modals Alexa Apartments -->
        <div
          class="modal fade"
          id="project3"
          tabindex="-1"
          aria-labelledby="Alexa Apartments"
          aria-hidden="true"
        >
          <div class="modal-dialog modal-fullscreen bg-white text-dark">
            <div class="modal-content d-flex p-0">
              <div class="position-absolute top-0 start-0">
                <button
                  type="button"
                  class="btn-close p-3"
                  data-bs-dismiss="modal"
                  aria-label="Close"
                ></button>
              </div>

              <div class="container-fluid p-md-0">
                <div class="row m-0 align-items-center">
                  <div
                    class="col-md-5 p-0 py-5 ps-md-2 pe-md-5 offset-md-1 align-self-center"
                  >
                    <h1>Alexa Apartments</h1>
                    <h2>Robust Developments</h2>
                    Seven unique and contemporary apartments with a clean modern
                    design, fitted with our Urban Life handleless kitchens to
                    create a clean and modern design that appeals to the young
                    professional home buyer.
                    <div class="row pb-4">
                      <div class="col-6">
                        <img
                          src="assets\theme\build\img\developers\modals\alexa_in.jpg"
                          class="img-fluid p-2"
                          alt="Alexa Apartments Kitchen "
                          loading="lazy"
                        />
                      </div>
                      <div class="col-6">
                        <img
                          src="assets\theme\build\img\developers\modals\alexa_in_2.jpg"
                          class="img-fluid p-2"
                          alt="Alexa Apartments Kitchen"
                          loading="lazy"
                        />
                      </div>
                    </div>
                    <h3 class="pt-3 text-muted fs-4">
                      "We work with Urban Myth because of the quality of the
                      products but also the knowledge and skills of their team
                      who assist us throughout the whole process. The end
                      results are fantastic and we have no hesitation in
                      recommending them"
                    </h3>
                    <p><small>Sam Hampton, Robust Developments</small></p>
                    <a href="" target="_blank" class="btn btn-outline-dark"
                      >CASE STUDY</a
                    >
                  </div>
                  <div class="col-md-6 vh-100 position-relative">
                    <img
                      src="assets\theme\build\img\developers\modals\alexa_hero.jpg"
                      class="modal-img"
                      alt="Alexa Apartments Kitchen"
                      loading="lazy"
                    />
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- End Modals -->
        <!-- Modals Buckingham Road -->
        <div
          class="modal fade"
          id="project4"
          tabindex="-1"
          aria-labelledby="Buckingham Road"
          aria-hidden="true"
        >
          <div class="modal-dialog modal-fullscreen bg-white text-dark">
            <div class="modal-content d-flex p-0">
              <div class="position-absolute top-0 start-0">
                <button
                  type="button"
                  class="btn-close p-3"
                  data-bs-dismiss="modal"
                  aria-label="Close"
                ></button>
              </div>

              <div class="container-fluid p-md-0">
                <div class="row m-0 align-items-center">
                  <div
                    class="col-md-5 p-0 py-5 ps-md-2 pe-md-5 offset-md-1 align-self-center"
                  >
                    <h1>Buckingham Road</h1>
                    <h2>Regenta</h2>
                    <p>
                      Two beautiful Victorian style houses in South Woodford
                      Village feature a streamlined but traditional kitchen
                      design. To complement the traditional features of the
                      properties the kitchens feature our Urban Life Shaker
                      cabinetry in Dust Grey.
                    </p>

                    <div class="row pb-4">
                      <div class="col-6">
                        <img
                          src="assets\theme\build\img\developers\modals\buckingham_in.jpg"
                          class="img-fluid p-2"
                          alt="Buckingham Road Kitchen "
                          loading="lazy"
                        />
                      </div>
                      <div class="col-6">
                        <img
                          src="assets\theme\build\img\developers\modals\buckingham_in_2.jpg"
                          class="img-fluid p-2"
                          alt=""
                          loading="lazy"
                        />
                      </div>
                    </div>
                    <h3 class="pt-3 text-muted fs-4">
                      "Urban Myth offer a great all round service, their
                      experienced team are approachable and understanding of our
                      needs. We look forward to working on our next project with
                      them"
                    </h3>
                    <p><small>Alex Piggott, Regenta Development</small></p>
                    <a href="" target="_blank" class="btn btn-outline-dark"
                      >CASE STUDY</a
                    >
                  </div>
                  <div class="col-md-6 vh-100 position-relative">
                    <img
                      src="assets\theme\build\img\developers\modals\buckingham_hero.jpg"
                      class="modal-img"
                      alt="Buckingham Road Kitchen"
                      loading="lazy"
                    />
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- End Modals -->
        <!-- Modals Bushett Rise -->
        <div
          class="modal fade"
          id="project5"
          tabindex="-1"
          aria-labelledby="Bushett Rise"
          aria-hidden="true"
        >
          <div class="modal-dialog modal-fullscreen bg-white text-dark">
            <div class="modal-content d-flex p-0">
              <div class="position-absolute top-0 start-0">
                <button
                  type="button"
                  class="btn-close p-3"
                  data-bs-dismiss="modal"
                  aria-label="Close"
                ></button>
              </div>

              <div class="container-fluid p-md-0">
                <div class="row m-0 align-items-center">
                  <div
                    class="col-md-5 p-0 py-5 ps-md-2 pe-md-5 offset-md-1 align-self-center"
                  >
                    <h1>Bushett Rise</h1>
                    <h2>The Door</h2>
                    <p>
                      The collection of seven contemporary countryside homes
                      have been created with meticulous detail. Each home
                      complements each other whilst remaining wonderfully
                      unique. From the Barn conversions to the modern new
                      houses, each home is full of character but share the same
                      high speciﬁcation and ﬁnishing throughout.
                    </p>

                    <div class="row pb-4">
                      <div class="col-6">
                        <img
                          src="assets\theme\build\img\developers\modals\bushett_in.jpg"
                          class="img-fluid p-2"
                          alt="Bushett Rise Kitchen "
                          loading="lazy"
                        />
                      </div>
                      <div class="col-6">
                        <img
                          src="assets\theme\build\img\developers\modals\bushett_in_2.jpg"
                          class="img-fluid p-2"
                          alt="Bushett Rise Kitchen"
                          loading="lazy"
                        />
                      </div>
                    </div>
                    <h3 class="pt-3 text-muted fs-4">
                      "We engaged Urban Myth to provide the kitchens and
                      wardrobes on one of our latest projects because they share
                      our vision to deliver design-led and innovative living
                      spaces that meet the highest of standards. The team were
                      great to work with and the finished results look
                      fantastic."
                    </h3>
                    <p><small>Russell Prince, The Door</small></p>
                    <a href="" target="_blank" class="btn btn-outline-dark"
                      >CASE STUDY</a
                    >
                  </div>
                  <div class="col-md-6 vh-100 position-relative">
                    <img
                      src="assets\theme\build\img\developers\modals\bushett_hero.jpg"
                      class="modal-img"
                      alt="Bushett Rise Kitchen"
                      loading="lazy"
                    />
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- End Modals -->
        <!-- Modals The Drapery -->
        <div
          class="modal fade"
          id="project6"
          tabindex="-1"
          aria-labelledby="The Drapery"
          aria-hidden="true"
        >
          <div class="modal-dialog modal-fullscreen bg-white text-dark">
            <div class="modal-content d-flex p-0">
              <div class="position-absolute top-0 start-0">
                <button
                  type="button"
                  class="btn-close p-3"
                  data-bs-dismiss="modal"
                  aria-label="Close"
                ></button>
              </div>

              <div class="container-fluid p-md-0">
                <div class="row m-0 align-items-center">
                  <div
                    class="col-md-5 p-0 py-5 ps-md-2 pe-md-5 offset-md-1 align-self-center"
                  >
                    <h1>The Drapery</h1>
                    <h2>Harding Homes</h2>
                    <p>
                      This exciting development by Harding Homes revitalised one
                      of Southend-on-Sea’s Edwardian architectural icons, the
                      former Brightwell’s Drapery and department store.
                    </p>

                    <p>
                      All 18 apartments feature Stone Grey units from the Urban
                      Life range with fully integrated appliances from the
                      leading brands including Neff, Smeg and Blanco.
                    </p>

                    <div class="row pb-4">
                      <div class="col-6">
                        <img
                          src="assets\theme\build\img\developers\modals\drapery_in.jpg"
                          class="img-fluid p-2"
                          alt="The Drapery Kitchen "
                          loading="lazy"
                        />
                      </div>
                      <div class="col-6">
                        <img
                          src="assets\theme\build\img\developers\modals\drapery_in_2.jpg"
                          class="img-fluid p-2"
                          alt="The Drapery Kitchen"
                          loading="lazy"
                        />
                      </div>
                    </div>
                    <h3 class="pt-3 text-muted fs-4">
                      "The final design was stunning yet, remained within our
                      original budget. We cannot recommend Urban Myth more – all
                      aspects of the service are fantastic"
                    </h3>
                    <p><small>Mark & Jason Harding, Harding Homes</small></p>
                    <a href="" target="_blank" class="btn btn-outline-dark"
                      >CASE STUDY</a
                    >
                  </div>
                  <div class="col-md-6 vh-100 position-relative">
                    <img
                      src="assets\theme\build\img\developers\modals\drapery_hero.jpg"
                      class="modal-img"
                      alt="The Drapery Kitchen"
                      loading="lazy"
                    />
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- End Modals -->
        <!-- Modals Gaynes Park -->
        <div
          class="modal fade"
          id="project8"
          tabindex="-1"
          aria-labelledby="Gaynes Park"
          aria-hidden="true"
        >
          <div class="modal-dialog modal-fullscreen bg-white text-dark">
            <div class="modal-content d-flex p-0">
              <div class="position-absolute top-0 start-0">
                <button
                  type="button"
                  class="btn-close p-3"
                  data-bs-dismiss="modal"
                  aria-label="Close"
                ></button>
              </div>

              <div class="container-fluid p-md-0">
                <div class="row m-0 align-items-center">
                  <div
                    class="col-md-5 p-0 py-5 ps-md-2 pe-md-5 offset-md-1 align-self-center"
                  >
                    <h1>Gaynes Park</h1>
                    <h2>AWC</h2>
                    <p>
                      Five contemporary houses have been seamlessly built into
                      the countryside and provide spectacular views of Essex and
                      the London city skyline.
                    </p>

                    <p>
                      Every detail has been meticulously designed to suit the
                      individuality of each house. Our client wanted a
                      minimalist style that would appeal to many tastes whilst
                      generating a unique and practical space for cooking and
                      entertaining.
                    </p>

                    <div class="row pb-4">
                      <div class="col-6">
                        <img
                          src="assets\theme\build\img\developers\modals\gayners_in.jpg"
                          class="img-fluid p-2"
                          alt="Gaynes Park Kitchen "
                          loading="lazy"
                        />
                      </div>
                      <div class="col-6">
                        <img
                          src="assets\theme\build\img\developers\modals\gayners_in_2.jpg"
                          class="img-fluid p-2"
                          alt="Gaynes Park Kitchen"
                          loading="lazy"
                        />
                      </div>
                    </div>
                    <h3 class="pt-3 text-muted fs-4">
                      "Urban myth were our first choice to work with on this
                      project at Gaynes Park, they understood the brief and made
                      sure these kitchens really delivered the “wow” factor."
                    </h3>
                    <p><small>Tony White, AWC</small></p>
                    <a href="" target="_blank" class="btn btn-outline-dark"
                      >CASE STUDY</a
                    >
                  </div>
                  <div class="col-md-6 vh-100 position-relative">
                    <img
                      src="assets\theme\build\img\developers\modals\gayners_hero.jpg"
                      class="modal-img"
                      alt="Gaynes Park Kitchen"
                      loading="lazy"
                    />
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- End Modals -->
        <!-- Modals Node Park -->
        <div
          class="modal fade"
          id="project7"
          tabindex="-1"
          aria-labelledby="Node Park"
          aria-hidden="true"
        >
          <div class="modal-dialog modal-fullscreen bg-white text-dark">
            <div class="modal-content d-flex p-0">
              <div class="position-absolute top-0 start-0">
                <button
                  type="button"
                  class="btn-close p-3"
                  data-bs-dismiss="modal"
                  aria-label="Close"
                ></button>
              </div>

              <div class="container-fluid p-md-0">
                <div class="row m-0 align-items-center">
                  <div
                    class="col-md-5 p-0 py-5 ps-md-2 pe-md-5 offset-md-1 align-self-center"
                  >
                    <h1>Node Park</h1>
                    <h2>Taylor French</h2>
                    <p>
                      Urban Myth has been involved with the transformation of
                      this historic development since conception and when
                      designing and specifying the kitchen furniture and
                      fittings for this development we ensured that no detail
                      was overlooked and the kitchens enhanced the character of
                      the properties.
                    </p>

                    <p>
                      We have designed, manufactured and installed all 16
                      kitchens for three new build detached houses, three
                      renovated mews style coach houses and ten apartments.
                    </p>

                    <div class="row pb-4">
                      <div class="col-6">
                        <img
                          src="assets\theme\build\img\developers\modals\node_in.jpg"
                          class="img-fluid p-2"
                          alt="Node Park Kitchen "
                          loading="lazy"
                        />
                      </div>
                      <div class="col-6">
                        <img
                          src="assets\theme\build\img\developers\modals\node_in_2.jpg"
                          class="img-fluid p-2"
                          alt="Node Park Kitchen"
                          loading="lazy"
                        />
                      </div>
                    </div>
                    <h3 class="pt-3 text-muted fs-4"></h3>
                    <p><small></small></p>
                    <a href="" target="_blank" class="btn btn-outline-dark"
                      >CASE STUDY</a
                    >
                  </div>
                  <div class="col-md-6 vh-100 position-relative">
                    <img
                      src="assets\theme\build\img\developers\modals/node_hero.jpg"
                      class="modal-img"
                      alt="Node Park Kitchen"
                      loading="lazy"
                    />
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- End Modals -->
        <!-- Modals Royal Military Academy -->
        <div
          class="modal fade"
          id="project9"
          tabindex="-1"
          aria-labelledby="Royal Military Academy"
          aria-hidden="true"
        >
          <div class="modal-dialog modal-fullscreen bg-white text-dark">
            <div class="modal-content d-flex p-0">
              <div class="position-absolute top-0 start-0">
                <button
                  type="button"
                  class="btn-close p-3"
                  data-bs-dismiss="modal"
                  aria-label="Close"
                ></button>
              </div>

              <div class="container-fluid p-md-0">
                <div class="row m-0 align-items-center">
                  <div
                    class="col-md-5 p-0 py-5 ps-md-2 pe-md-5 offset-md-1 align-self-center"
                  >
                    <h1>Royal Military Academy</h1>
                    <h2>Durkan</h2>
                    <p>
                      A collection of inspirational homes of true character. The
                      Royal Military Academy has been fully restored by Durkan
                      Estates, with ten apartments offering a collection of
                      inspirational homes of true character, many of which are
                      within the original Grade II* listed buildings and benefit
                      from a wealth of original features. Urban Myth
                      &nbsp;designed stunning Anthracite Urban Myth kitchens to
                      contrast superbly with the original architectural gothic
                      style.
                    </p>

                    <div class="row pb-4">
                      <div class="col-6">
                        <img
                          src="assets\theme\build\img\developers\modals/royal_in.jpg"
                          class="img-fluid p-2"
                          alt="Royal Military Academy Kitchen "
                          loading="lazy"
                        />
                      </div>
                      <div class="col-6">
                        <img
                          src="assets\theme\build\img\developers\modals/royal_in_2.jpg"
                          class="img-fluid p-2"
                          alt="Royal Military Academy Kitchen"
                          loading="lazy"
                        />
                      </div>
                    </div>
                    <h3 class="pt-3 text-muted fs-4"></h3>
                    <p><small></small></p>
                    <a href="" target="_blank" class="btn btn-outline-dark"
                      >CASE STUDY</a
                    >
                  </div>
                  <div class="col-md-6 vh-100 position-relative">
                    <img
                      src="assets\theme\build\img\developers\modals/royal_hero.jpg"
                      class="modal-img"
                      alt="Royal Military Academy Kitche"
                      loading="lazy"
                    />
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- End Modals -->
        <!-- Modals Whitehall Lane -->
        <div
          class="modal fade"
          id="project11"
          tabindex="-1"
          aria-labelledby="Whitehall Lane"
          aria-hidden="true"
        >
          <div class="modal-dialog modal-fullscreen bg-white text-dark">
            <div class="modal-content d-flex p-0">
              <div class="position-absolute top-0 start-0">
                <button
                  type="button"
                  class="btn-close p-3"
                  data-bs-dismiss="modal"
                  aria-label="Close"
                ></button>
              </div>

              <div class="container-fluid p-md-0">
                <div class="row m-0 align-items-center">
                  <div
                    class="col-md-5 p-0 py-5 ps-md-2 pe-md-5 offset-md-1 align-self-center"
                  >
                    <h1>Whitehall Lane</h1>
                    <h2>Etec Group</h2>
                    <p>
                      A Luxury development of three stunning detached houses
                      situated in close proximity of Epping forest. Our client
                      wanted a feeling of warmth and flow to the homes, our
                      design achieves this with generous walkthrough between the
                      kitchen and dining areas whilst also providing an
                      efficient cooking area and a welcoming entertaining space.
                    </p>

                    <div class="row pb-4">
                      <div class="col-6">
                        <img
                          src="assets\theme\build\img\developers\modals/whitehall_in.jpg"
                          class="img-fluid p-2"
                          alt="Whitehall Lane Kitchen "
                          loading="lazy"
                        />
                      </div>
                      <div class="col-6">
                        <img
                          src="assets\theme\build\img\developers\modals/whitehall_in_2.jpg"
                          class="img-fluid p-2"
                          alt="Whitehall Lane Kitchen"
                          loading="lazy"
                        />
                      </div>
                    </div>
                    <h3 class="pt-3 text-muted fs-4">
                      "We’ve worked with Urban Myth on several projects now, the
                      quality of their kitchens and attention to detail is a
                      perfect fit to achieve the high level of finish we
                      require. The organised and efficient team offer a great
                      all-round service from design through to installation and
                      we look forward to working with them again"
                    </h3>
                    <p><small>Michael Smith, Etec Group</small></p>
                    <a href="" target="_blank" class="btn btn-outline-dark"
                      >CASE STUDY</a
                    >
                  </div>
                  <div class="col-md-6 vh-100 position-relative">
                    <img
                      src="assets\theme\build\img\developers\modals/whitehall_hero.jpg"
                      class="modal-img"
                      alt="Whitehall Lane Kitchen"
                      loading="lazy"
                    />
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- End Modals -->
        <!-- Modals Charles Baker Place -->
        <div
          class="modal fade"
          id="project10"
          tabindex="-1"
          aria-labelledby="Charles Baker Place"
          aria-hidden="true"
        >
          <div class="modal-dialog modal-fullscreen bg-white text-dark">
            <div class="modal-content d-flex p-0">
              <div class="position-absolute top-0 start-0">
                <button
                  type="button"
                  class="btn-close p-3"
                  data-bs-dismiss="modal"
                  aria-label="Close"
                ></button>
              </div>

              <div class="container-fluid p-md-0">
                <div class="row m-0 align-items-center">
                  <div
                    class="col-md-5 p-0 py-5 ps-md-2 pe-md-5 offset-md-1 align-self-center"
                  >
                    <h1>Charles Baker Place</h1>
                    <h2>Chester Row</h2>
                    <p>
                      Charles Baker Place is a development by Chester Row of
                      nine family homes comprising an unusual variety of houses.
                      We are proud to have designed, manufactured and installed
                      all nine kitchens in this prestigious development. Many of
                      the houses have natural light flooding in from the garden
                      or balconies and by using fresh and modern colour palettes
                      for the kitchens we added to the spacious feel of the open
                      plan rooms.
                    </p>

                    <div class="row pb-4">
                      <div class="col-6">
                        <img
                          src="assets\theme\build\img\developers\modals/charles_in.jpg"
                          class="img-fluid p-2"
                          alt="Charles Baker Place Kitchen "
                          loading="lazy"
                        />
                      </div>
                      <div class="col-6">
                        <img
                          src="assets\theme\build\img\developers\modals/charles_in_2.jpg"
                          class="img-fluid p-2"
                          alt="Charles Baker Place Kitchen"
                          loading="lazy"
                        />
                      </div>
                    </div>
                    <h3 class="pt-3 text-muted fs-4">
                      "We continue to work with Urban Myth on numerous projects
                      as they provide an excellent product and professional
                      service. On top of that the in-house production facilities
                      gives them the flexibility to meet challenging timescales
                      which is essential in our industry."
                    </h3>
                    <p><small>Jolyon Prowse, Chester Row</small></p>
                    <a href="" target="_blank" class="btn btn-outline-dark"
                      >CASE STUDY</a
                    >
                  </div>
                  <div class="col-md-6 vh-100 position-relative">
                    <img
                      src="assets\theme\build\img\developers\modals/charles_hero.jpg"
                      class="modal-img"
                      alt="Charles Baker Place Kitchen"
                      loading="lazy"
                    />
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- End Modals -->
        <!-- Modals Yew Tree Close -->
        <div
          class="modal fade"
          id="project12"
          tabindex="-1"
          aria-labelledby="Yew Tree Close"
          aria-hidden="true"
        >
          <div class="modal-dialog modal-fullscreen bg-white text-dark">
            <div class="modal-content d-flex p-0">
              <div class="position-absolute top-0 start-0">
                <button
                  type="button"
                  class="btn-close p-3"
                  data-bs-dismiss="modal"
                  aria-label="Close"
                ></button>
              </div>

              <div class="container-fluid p-md-0">
                <div class="row m-0 align-items-center">
                  <div
                    class="col-md-5 p-0 py-5 ps-md-2 pe-md-5 offset-md-1 align-self-center"
                  >
                    <h1>Yew Tree Close</h1>
                    <h2>Morricom</h2>
                    <p>
                      A unique collection of four architecturally designed
                      contemporary townhouses in the heart of Muswell Hill. We
                      were delighted to be involved in this project to design
                      and fit all four high specification bespoke kitchens from
                      our Urban Life range.
                    </p>

                    <div class="row pb-4">
                      <div class="col-6">
                        <img
                          src="assets\theme\build\img\developers\modals/yew_in.jpg"
                          class="img-fluid p-2"
                          alt="Yew Tree Close Kitchen "
                          loading="lazy"
                        />
                      </div>
                      <div class="col-6">
                        <img
                          src="assets\theme\build\img\developers\modals/yew_in_2.jpg"
                          class="img-fluid p-2"
                          alt="Yew Tree Close Kitchen"
                          loading="lazy"
                        />
                      </div>
                    </div>
                    <h3 class="pt-3 text-muted fs-4">
                      "It was a pleasure to work with the Urban Myth on our
                      project at Yew Tree Close. Their level of service and
                      design detail was exactly what we required for this
                      exclusive development. We look forward to working with Rob
                      and the team again."
                    </h3>
                    <p><small>Brendan & Julie Morrisey, Morricom Ltd</small></p>
                    <a href="" target="_blank" class="btn btn-outline-dark"
                      >CASE STUDY</a
                    >
                  </div>
                  <div class="col-md-6 vh-100 position-relative">
                    <img
                      src="assets\theme\build\img\developers\modals/yewtree_hero.jpg"
                      class="modal-img"
                      alt="Yew Tree Close Kitchen"
                      loading="lazy"
                    />
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- End Modals -->
        <!-- End -->

        <!-- section 5 -->
        <section
          id="planning"
          class="d-none d-md-flex align-items-start bg-light position-relative"
        >
          <div
            class="position-absolute mb-5 bottom-0 start-50 translate-middle-x"
            style="z-index: 300"
          >
            <a class="scroll p-5 text-dark" href="[[~[[*id]]]]#showroom"
              ><i class="bi bi-chevron-double-down" style="font-size: 3rem"></i
            ></a>
          </div>
          <div class="container-fluid m-0 p-0">
            <div
              class="col-md-4 position-absolute p-5 text-dark"
              style="z-index: 10"
            >
              <h1>Space Planning</h1>
              <h2>Turning your vision into reality</h2>
              <p>
                Over 30 years’ experience of working with homeowners, as well as
                developers, has given us a deep appreciation of how people want
                to live. It also keeps us up-to-date with the latest design
                trends. Our clear understanding of people’s needs and
                aspirations allows us to plan the most efficient and attractive
                spaces to suit your project.
              </p>
            </div>
            <div
              id="container1"
              class="mx-auto"
              style="z-index: 5; max-width: 1600px"
            >
              <img
                src="/assets/theme/build/img/developers/section-5-before.jpg"
                alt="Kitchen Pre Vis"
                class="img-fluid p-0"
              />
              <img
                src="/assets/theme/build/img/developers/section-5-after.jpg"
                alt="Kitchen completed"
                class="img-fluid p-0"
              />
            </div>
          </div>
        </section>
        <!-- Mobile Section -->
        <section
          id="planning-mobile"
          class="d-md-none d-flex align-items-start bg-light"
        >
          <div class="container-fluid m-0 p-0">
            <div class="col-md-4 p-5 text-dark" style="z-index: 10">
              <h1>Space Planning</h1>
              <h2>Turning your vision into reality</h2>
              <p>
                Over 30 years’ experience of working with homeowners, as well as
                developers, has given us a deep appreciation of how people want
                to live. It also keeps us up-to-date with the latest design
                trends. Our clear understanding of people’s needs and
                aspirations allows us to plan the most efficient and attractive
                spaces to suit your project.
              </p>
            </div>
            <div id="container1" class="" style="z-index: 5">
              <img
                src="/assets/theme/build/img/developers/section-5-before.jpg"
                alt=""
                class="img-fluid p-0"
              />
              <img
                src="/assets/theme/build/img/developers/section-5-after.jpg"
                alt=""
                class="img-fluid p-0"
              />
            </div>
          </div>
        </section>
        <!-- End -->

        <!-- section 6 -->
        <section
          id="showroom"
          class="d-flex align-items-start min-vh-100 bg-dark text-light overflow-hidden position-relative"
        >
          <div
            class="position-absolute mb-5 bottom-0 start-50 translate-middle-x"
            style="z-index: 300"
          >
            <a class="scroll p-5 text-dark" href="[[~[[*id]]]]#our-factory"
              ><i class="bi bi-chevron-double-down" style="font-size: 3rem"></i
            ></a>
          </div>
          <div class="container-fluid my-5">
            <div class="row mx-md-5 pb-4">
              <div class="col-md-6 order-md-1 order-2">
                <h1>Our Showroom</h1>
                <h2>Inspiration at every turn</h2>
                <p>
                  Our impressive showroom provides the perfect environment for a
                  specification meeting. Here you can see, touch, and feel the
                  quality of our products. And you can also meet the team – the
                  people who make working with Urban Myth such a professional
                  and pleasurable experience.
                </p>
              </div>
              <div class="col order-1">
                <a href="#partners" class="float-end btn btn-outline-light"
                  >CONTACT</a
                >
              </div>
            </div>
            <div class="row mx-md-5">
              <div class="ratio ratio-16x9">
                <iframe
                  loading="lazy"
                  class=""
                  src="https://my.matterport.com/show/?m=2ftCfgKxYrw"
                  frameborder="0"
                  allowfullscreen
                  allow="xr-spatial-tracking"
                ></iframe>
              </div>
            </div>
          </div>
        </section>
        <!-- End -->

        <!-- section 7 -->
        <section
          id="our-factory"
          class="d-flex align-items-center min-vh-100 bg-light position-relative"
        >
          <div
            class="position-absolute mb-5 bottom-0 start-50 translate-middle-x"
            style="z-index: 300"
          >
            <a class="scroll p-5 text-dark" href="[[~[[*id]]]]#suppliers"
              ><i class="bi bi-chevron-double-down" style="font-size: 3rem"></i
            ></a>
          </div>
          <div class="container-fluid my-5">
            <div class="row mx-md-5 pb-4 pb-md-0">
              <div class="col-md-4 align-self-center">
                <h1>Our Factory</h1>
                <h2>Precise manufacturing to your specifications</h2>
                <p>
                  One unique aspect of working with Urban Myth is our factory in
                  Essex, where we produce our entire Urban Life range in-house.
                  Our state-of-the-art machinery allows us to produce kitchens
                  and bedrooms with maximum efficiency and total control over
                  the manufacturing process, meaning we can remain competitive
                  without compromising on quality.
                </p>
              </div>
              <div class="col-md-4 col-6">
                <img
                  src="/assets/theme/build/img/developers/factory-4.jpg"
                  alt=""
                  class="img-fluid reveal col-md-10 offset-md-2 mb-md-4 mb-4"
                />
                <!-- <img src="img/factory/factory_1.jpg" alt="" class="img-fluid reveal  mb-md-2 mb-4"> -->
              </div>
              <div class="col-md-4 col-6 my-auto">
                <img
                  src="/assets/theme/build/img/developers/factory-2.jpg"
                  alt=""
                  class="img-fluid reveal mb-4"
                />
                <img
                  src="/assets/theme/build/img/developers/factory-3.jpg"
                  alt=""
                  class="img-fluid col-md-8 reveal"
                />
              </div>
            </div>
          </div>
        </section>
        <!-- End -->

        <!-- section 8 -->
        <section
          id="suppliers"
          class="d-flex align-items-center min-vh-100 bg-secondary position-relative"
        >
          <div
            class="position-absolute mb-5 bottom-0 start-50 translate-middle-x"
            style="z-index: 300"
          >
            <a
              class="scroll p-5 text-dark"
              href="[[~[[*id]]]]#project-managment"
              ><i class="bi bi-chevron-double-down" style="font-size: 3rem"></i
            ></a>
          </div>
          <div class="container-fluid my-5">
            <div class="row mx-md-5 pb-4 pb-md-0">
              <div class="col-md-4 col-6 order-md-1 order-2">
                <img
                  src="/assets/theme/build/img/developers/boil-tap.jpg"
                  alt="tap"
                  class="img-fluid reveal col-12 col-md-10 mb-4 offset-md-2 mb-md-4"
                />
                <img
                  src="/assets/theme/build/img/developers/cookers.jpg"
                  alt="cooker"
                  class="img-fluid reveal mb-4 col-12 col-md-10 mb-md-4"
                />
                <img
                  src="/assets/theme/build/img/developers/extractor.jpg"
                  alt="extractor worksurface"
                  class="img-fluid reveal col-12 col-md-10 offset-md-2 mb-4 mb-md-0"
                />
              </div>
              <div class="col-md-4 align-self-center order-1 order-md-2">
                <h1>Our Suppliers</h1>
                <h2>Giving you the advantage of our buying power</h2>
                <p>
                  The success of any project depends on the bottom line. Urban
                  Myth has excellent relationships with all the leading
                  appliance brands and suppliers to the kitchen and bedroom
                  industry. By working with Urban Myth, you have access to this
                  network and can take advantage of our buying power and
                  exclusive offers.
                </p>
              </div>
              <div class="col-md-4 col-6 order-3">
                <img
                  src="/assets/theme/build/img/developers/induction.jpg"
                  alt="induction hob"
                  class="img-fluid reveal col-12 col-md-10 mb-4 mb-md-4"
                />
                <img
                  src="/assets/theme/build/img/developers/oven.jpg"
                  alt="neff overn"
                  class="img-fluid reveal col-12 col-md-10 offset-md-2 mb-4 mb-md-4"
                />
                <img
                  src="/assets/theme/build/img/developers/stove-top.jpg"
                  alt="stove top"
                  class="img-fluid reveal col-12 col-md-10 mb-4 mb-md-0"
                />
              </div>
            </div>
          </div>
        </section>
        <!-- End -->

        <!-- section 9 -->
        <section
          id="project-managment"
          class="d-flex align-items-center min-vh-100 bg-dark text-light position-relative"
        >
          <div
            class="position-absolute mb-5 bottom-0 start-50 translate-middle-x"
            style="z-index: 300"
          >
            <a class="scroll p-5 text-light" href="[[~[[*id]]]]#service"
              ><i class="bi bi-chevron-double-down" style="font-size: 3rem"></i
            ></a>
          </div>
          <div class="container-fluid my-5">
            <div class="row mx-md-5 pb-md-4 align-items-center">
              <div class="col-md-5">
                <h1>Project Management<br />and Installation</h1>
                <h2>Exceeding expectations as standard</h2>
                <p>
                  For us, getting your project completed on time is an essential
                  requirement. Your own dedicated project manager will liaise
                  with all the tradespeople on-site, throughout your build. They
                  will make sure that everyone working on your project has a
                  detailed site pack, outlining specific requirements, to ensure
                  a seamless installation of our furniture and appliances.
                </p>
              </div>
              <div class="col-md-3 col-6">
                <img
                  src="/assets/theme/build/img/developers/install.jpg"
                  alt=""
                  class="img-fluid reveal mb-4"
                />
              </div>
              <div class="col-md-3 col-6">
                <img
                  src="/assets/theme/build/img/developers/on-site.jpg"
                  alt=""
                  class="img-fluid reveal mb-4"
                />
              </div>
            </div>
            <div class="row mx-md-5 pb-md-0 align-items-center">
              <div class="col-md-3 offset-md-1 col-6">
                <img
                  src="/assets/theme/build/img/developers/map.jpg"
                  alt=""
                  class="img-fluid reveal mb-4 mb-md-0"
                />
              </div>
              <div class="col-md-3 col-6">
                <img
                  src="/assets/theme/build/img/developers/service.jpg"
                  alt=""
                  class="img-fluid reveal mb-4 mb-md-0"
                />
              </div>
              <div class="col-md-4">
                <p>
                  All our installers are CSCS approved and by using the same
                  team from start to finish, we provide continuity throughout
                  the project. Plus, our documented sign-off process guarantees
                  that we meet your expectations at every stage of the
                  installation.
                </p>
              </div>
            </div>
          </div>
        </section>
        <!-- End -->

        <!-- section 10 -->
        <section
          id="service"
          class="d-flex align-items-center min-vh-100 bg-secondary text-light position-relative"
        >
          <div
            class="position-absolute mb-5 bottom-0 start-50 translate-middle-x"
            style="z-index: 300"
          >
            <a class="scroll p-5 text-dark" href="[[~[[*id]]]]#partners"
              ><i class="bi bi-chevron-double-down" style="font-size: 3rem"></i
            ></a>
          </div>
          <div class="container-fluid my-5">
            <div class="row mx-md-4 pb-5">
              <div class="col-12 pb-5">
                <a
                  href="[[~[[*id]]]]#partners"
                  class="float-end btn btn-outline-light"
                  >CONTACT</a
                >
              </div>
            </div>
            <div class="row mx-md-4 pb-md-4">
              <div class="col-md-4">
                <h1>Aftercare</h1>
                <h2>Support for your customers, peace of mind for you</h2>
                <p>
                  We leave our care and information booklet in every kitchen and
                  bedroom we install, to answer most of the questions your
                  customers might have about their new kitchen or bedroom
                  furniture. At your request, we can further support your
                  customers with our dedicated Aftercare Department. They can be
                  on hand to assist your customers, should the need arise,
                  taking one more thing off your mind.
                </p>
              </div>
              <div class="col-md-4 col-6">
                <img
                  src="/assets/theme/build/img/developers/hand.jpg"
                  alt=""
                  class="img-fluid reveal mt-0"
                />
              </div>
              <div class="col-md-4 col-6">
                <img
                  src="/assets/theme/build/img/developers/team-3.jpg"
                  alt=""
                  class="img-fluid reveal mb-0"
                />
              </div>
            </div>
          </div>
        </section>
        <!-- End -->

        <!-- section 11 -->
        <section
          id="partners"
          class="bg-light d-flex min-vh-100 align-items-center"
        >
          <div class="container-fluid py-5">
            <div class="row">
              <div class="col-md-2 col-4 mx-auto pb-5">
                <img
                  src="/assets/theme/build/img/developers/logo-white.png"
                  alt=""
                  class="img-fluid pb-5"
                />
              </div>
            </div>
            <div class="row mx-md-5 pb-4">
              <div class="col-md-5">
                <h1>Your trusted development partner</h1>
                <h2>By your side at every step</h2>
                <p>
                  When you work with Urban Myth, we are with you every step of
                  the way. Our service-led philosophy builds strong, trusting
                  relationships with our customers, who use us time and again.
                  We would welcome the opportunity to provide an indicative
                  design and a quotation for a current or future project.
                </p>
                <p>
                  <strong>Please contact:</strong><br /><a
                    href="mailto:info@urbanmyth.net"
                    >info@urbanmyth.net</a
                  ><br />020 8531 3413
                </p>
              </div>
              <div class="col-md-6 offset-md-1 pt-4">
                [[$formit]] [[$contact-form? &text-subject=`1`]]

                <script
                  type="text/javascript"
                  src="https://js.createsend1.com/javascript/copypastesubscribeformlogic.js"
                ></script>
              </div>
            </div>
          </div>
        </section>
        <!-- End -->
      </main>
      <!-- popup's -->
      [[$popup-block? &type=`book-app`]] [[$popup-block?
      &type=`brochure-request`]]
      <!------------->
      [[$footer]]
    </div>
    [[$scripts? js=`developers`]]
    <script
      src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
      integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
      crossorigin="anonymous"
    ></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
    <script src="https://unpkg.com/scrollreveal"></script>
    <script type="text/javascript">
      $(function () {
        $("#container1").twentytwenty();
      });
    </script>
  </body>
</html>
