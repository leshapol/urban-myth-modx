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
                        <img
                          src="/assets/theme/build/img/developers/slider-image-1.jpg"
                          alt="[[+title]]"
                          class="img-fluid mb-md-4 mb-4"
                          loading="lazy"
                        />
                        <!-- <div class="position-absolute top-0 end-0 m-1">
                          <img
                            src="/assets/theme/build/img/developers/slider-open.svg"
                            alt=""
                          />
                        </div> -->
                      </div>
                      <div class="project h-auto position-relative">
                        <img
                          src="/assets/theme/build/img/developers/slider-image-2.jpg"
                          alt="[[+title]]"
                          class="img-fluid mb-md-4 mb-4"
                          loading="lazy"
                        />
                        <!-- <div class="position-absolute top-0 end-0 m-1">
                          <img
                            src="/assets/theme/build/img/developers/slider-open.svg"
                            alt=""
                          />
                        </div> -->
                      </div>
                    </div>
                    <div class="col-md-3 col-4">
                      <!-- [[getImageList? &tvname=`Projects` &tpl=`more_project` &offset=`2` &limit=`2`]] -->
                      <div class="project h-auto position-relative">
                        <img
                          src="/assets/theme/build/img/developers/slider-image-3.jpg"
                          alt="[[+title]]"
                          class="img-fluid mb-md-4 mb-4"
                          loading="lazy"
                        />
                        <!-- <div class="position-absolute top-0 end-0 m-1">
                          <img
                            src="/assets/theme/build/img/developers/slider-open.svg"
                            alt=""
                          />
                        </div> -->
                      </div>
                      <div class="project h-auto position-relative">
                        <img
                          src="/assets/theme/build/img/developers/slider-image-4.jpg"
                          alt="[[+title]]"
                          class="img-fluid mb-md-4 mb-4"
                          loading="lazy"
                        />
                        <!-- <div class="position-absolute top-0 end-0 m-1">
                          <img
                            src="/assets/theme/build/img/developers/slider-open.svg"
                            alt=""
                          />
                        </div> -->
                      </div>
                    </div>
                    <div class="col-md-5 col-4">
                      <!-- [[getImageList? &tvname=`Projects` &tpl=`more_project`
                      &offset=`4` &limit=`1`]] -->
                      <div class="project h-auto position-relative">
                        <img
                          src="/assets/theme/build/img/developers/slider-image-5.jpg"
                          alt="[[+title]]"
                          class="img-fluid mb-md-4 mb-4"
                          loading="lazy"
                        />
                        <!-- <div class="position-absolute top-0 end-0 m-1">
                          <img
                            src="/assets/theme/build/img/developers/slider-open.svg"
                            alt=""
                          />
                        </div> -->
                      </div>
                    </div>
                  </div>
                </div>
                <div class="carousel-item">
                  <div class="row mx-md-5">
                    <div class="col-md-3 col-4">
                      <!-- [[getImageList? &tvname=`Projects` &tpl=`more_project` &offset=`5` &limit=`2`]] -->
                      <div class="project h-auto position-relative">
                        <img
                          src="/assets/theme/build/img/developers/slider-image-6.jpg"
                          alt="[[+title]]"
                          class="img-fluid mb-md-4 mb-4"
                          loading="lazy"
                        />
                        <!-- <div class="position-absolute top-0 end-0 m-1">
                          <img
                            src="/assets/theme/build/img/developers/slider-open.svg"
                            alt=""
                          />
                        </div> -->
                      </div>
                      <div class="project h-auto position-relative">
                        <img
                          src="/assets/theme/build/img/developers/slider-image-7.jpg"
                          alt="[[+title]]"
                          class="img-fluid mb-md-4 mb-4"
                          loading="lazy"
                        />
                        <!-- <div class="position-absolute top-0 end-0 m-1">
                          <img
                            src="/assets/theme/build/img/developers/slider-open.svg"
                            alt=""
                          />
                        </div> -->
                      </div>
                    </div>
                    <div class="col-md-4">
                      <!-- [[getImageList? &tvname=`Projects` &tpl=`more_project` &offset=`7` &limit=`2`]] -->
                      <div class="project h-auto position-relative">
                        <img
                          src="/assets/theme/build/img/developers/slider-image-8.jpg"
                          alt="[[+title]]"
                          class="img-fluid mb-md-4 mb-4"
                          loading="lazy"
                        />
                        <!-- <div class="position-absolute top-0 end-0 m-1">
                          <img
                            src="/assets/theme/build/img/developers/slider-open.svg"
                            alt=""
                          />
                        </div> -->
                      </div>
                      <div class="project h-auto position-relative">
                        <img
                          src="/assets/theme/build/img/developers/slider-image-9.jpg"
                          alt="[[+title]]"
                          class="img-fluid mb-md-4 mb-4"
                          loading="lazy"
                        />
                        <!-- <div class="position-absolute top-0 end-0 m-1">
                          <img
                            src="/assets/theme/build/img/developers/slider-open.svg"
                            alt=""
                          />
                        </div> -->
                      </div>
                    </div>
                    <div class="col-md-3 col-4">
                      <!-- [[getImageList? &tvname=`Projects` &tpl=`more_project` &offset=`9` &limit=`1`]] -->
                      <div class="project h-auto position-relative">
                        <img
                          src="/assets/theme/build/img/developers/slider-image-10.jpg"
                          alt="[[+title]]"
                          class="img-fluid mb-md-4 mb-4"
                          loading="lazy"
                        />
                        <!-- <div class="position-absolute top-0 end-0 m-1">
                          <img
                            src="/assets/theme/build/img/developers/slider-open.svg"
                            alt=""
                          />
                        </div> -->
                      </div>
                    </div>
                    <div class="col-md-2 col-4">
                      <!-- [[getImageList? &tvname=`Projects` &tpl=`more_project` &offset=`10` &limit=`2`]] -->
                      <div class="project h-auto position-relative">
                        <img
                          src="/assets/theme/build/img/developers/slider-image-11.jpg"
                          alt="[[+title]]"
                          class="img-fluid mb-md-4 mb-4"
                          loading="lazy"
                        />
                        <!-- <div class="position-absolute top-0 end-0 m-1">
                          <img
                            src="/assets/theme/build/img/developers/slider-open.svg"
                            alt=""
                          />
                        </div> -->
                      </div>
                      <div class="project h-auto position-relative">
                        <img
                          src="/assets/theme/build/img/developers/slider-image-12.jpg"
                          alt="[[+title]]"
                          class="img-fluid mb-md-4 mb-4"
                          loading="lazy"
                        />
                        <!-- <div class="position-absolute top-0 end-0 m-1">
                          <img
                            src="/assets/theme/build/img/developers/slider-open.svg"
                            alt=""
                          />
                        </div> -->
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
        <!-- [[getImageList? &tvname=`Projects` &tpl=`more_modal`]] -->
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
                  <strong>Please contact:</strong
                  ><br />robert@urbanmyth.net<br />020 8531 3413
                </p>
              </div>
              <div class="col-md-6 offset-md-1 pt-4">
                [[$formit]] [[$contact-form]]

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
