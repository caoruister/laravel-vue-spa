<template>
  <div>
    <nav class="navbar navbar-default navbar-main navbar-fixed-top">
      <div class="container-fluid container-search-results">
        <div class="navbar-header client-header" v-bind:class="{'search-toggled': searchToggled}">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                  data-target="#bs-example-navbar-collapse-1"><i class="icon-header-icon3 open-icon"></i><i
            class="icon-header-icon2 close-icon"></i></button>
          <div class="screen-link toggle-link">
            <div><i class="icon-search" v-on:click="searchToggled = true"></i><i class="icon-header-icon2" v-on:click="searchToggled = false"></i></div>
          </div>
          <router-link :to="{ name: 'welcome' }" class="navbar-brand logo-navbar-brand">
            <i class="icon-logo5"></i>
          </router-link>
          <div class="navbar-brand search-navbar-brand"><input type="text"
                                                               class="form-control visible-xs search-input ng-pristine ng-valid ng-empty ng-touched"
                                                               placeholder="Search" autocomplete="off"
                                                               novalidate="" ng-bs-autocomplete="search1"
                                                               ng-bs-autocomplete-min="0"
                                                               ng-model="searchResult1"><input type="text"
                                                                                               class="form-control hidden-xs search-input ng-pristine ng-untouched ng-valid ng-empty"
                                                                                               placeholder="Search by Name or Location"
                                                                                               autocomplete="off"
                                                                                               novalidate=""
                                                                                               ng-bs-autocomplete="search1"
                                                                                               ng-bs-autocomplete-min="0"
                                                                                               ng-model="searchResult1">
            <div class="autocomplete-suggestions"
                 style="position: absolute; max-height: 300px; z-index: 9999; opacity: 1; top: 60px; left: 0px; width: 274px; display: none;">
              <div class="autocomplete-group"><strong>Recent Searches</strong></div>
              <div class="autocomplete-suggestion autocomplete-selected" data-index="0">Prince Edward Island,
                Canada
              </div>
            </div>
            <div class="autocomplete-suggestions"
                 style="position: absolute; display: none; max-height: 300px; z-index: 9999;"></div>
          </div>
          <router-link :to="{ name: 'welcome' }" class="navbar-brand hidden-xs">
            <i class="icon-logo5"></i>
          </router-link>
        </div>
        <div class="navbar-collapse collapse" id="bs-example-navbar-collapse-1" style="height: 1px;">
          <ul class="nav navbar-nav navbar-left hidden-xs">
            <li class="no-padding-top"><input type="text"
                                              class="form-control search-input ng-pristine ng-valid ng-empty ng-touched"
                                              placeholder="Search by Name or Location" autocomplete="off"
                                              novalidate="" ng-bs-autocomplete="search1"
                                              ng-bs-autocomplete-min="0" ng-model="searchResult1"><i
              class="icon-header-icon2 clear-text ng-hide" ng-clear-text=""
              ng-clear-text-model="searchResult1" ng-clear-text-input=".search-input"
              ng-show="searchResult1 != undefined"></i>
              <div class="autocomplete-suggestions"
                   style="position: absolute; max-height: 300px; z-index: 9999; opacity: 1; top: 60px; left: 0px; width: 460px; display: none;">
                <div class="autocomplete-group"><strong>Recent Searches</strong></div>
                <div class="autocomplete-suggestion autocomplete-selected" data-index="0">Prince Edward
                  Island, Canada
                </div>
              </div>
            </li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li class="link-item visible-xs"><a href="/"><i class="icon-home"></i>Home</a></li>
            <li>
              <router-link :to="{ name: 'login' }" class="btn btn-four first-btn">
                {{ $t('login') }}
              </router-link>
            </li>
            <li>
              <router-link :to="{ name: 'register' }" class="btn btn-five">
                {{ $t('register') }}
              </router-link>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <div class="search-results-page">
      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-12 no-padding-left hidden-xs">
            <div class="navigation-urls navigation-urls-not-mobile"><span class="navigation-url"><a
              href="/country/canada">Canada</a><span> / </span></span><span class="navigation-url"><span>Prince Edward Island</span></span>
            </div>
          </div>
          <div class="col-xs-12 no-padding-left visible-xs">
            <div class="navigation-urls navigation-urls-mobile">
              <div class="collapse navigation-block" id="navigation-block"><a class="navigation-url"
                                                                              href="/country/canada"><i
                class="icon-booking-icon5"></i>Canada</a></div>
              <div class="navigation-toggle collapsed" data-toggle="collapse" href="#navigation-block"><span
                class="navigation-url not-url"><i class="icon-booking-icon5"></i><i
                class="icon-footer-arrow-up"></i>Prince Edward Island</span></div>
            </div>
          </div>
        </div>
        <div class="row row1">
          <div class="col-sm-12">
            <div class="row info-block w-100">
              <div class="col-sm-3 col-md-4 col-xs-5 search_results__header"><h1
                class="search_results__header__text">FOUND <span class="all-count">14</span> <span
                class="all-count-text">RESULTS</span></h1>
                <div class="search_results__header__text map active"><i
                  class="icon-search-results-icon5"></i> MAP VIEW
                </div>
                <div class="search_results__header__text list"><i class="icon-search-results-icon6"></i>
                  LIST VIEW
                </div>
              </div>
              <div class="col-xs-12 search_results__filter visible-xs">
                <div class="btn-filter" ng-class="{'selected': isFiltered(1)}" ng-click="filter(1)">Open
                  Now
                </div>
                <div class="btn-filter" ng-class="{'selected': isFiltered(2)}" ng-click="filter(2)">24/7
                  Emergency
                </div>
              </div>
            </div>
            <div class="search_results active ">
              <div>
                <div class="search_results__loading hide">
                  <div class="text">Please wait, searching...</div>
                  <div class="spinner">
                    <div class="sk-fading-circle">
                      <div class="sk-circle1 sk-circle"></div>
                      <div class="sk-circle2 sk-circle"></div>
                      <div class="sk-circle3 sk-circle"></div>
                      <div class="sk-circle4 sk-circle"></div>
                      <div class="sk-circle5 sk-circle"></div>
                      <div class="sk-circle6 sk-circle"></div>
                      <div class="sk-circle7 sk-circle"></div>
                      <div class="sk-circle8 sk-circle"></div>
                    </div>
                  </div>
                </div>
                <div class="search_results__notfound hide">
                  <div><i class="icon-search-results-icon2"></i></div>
                  <div>No results found</div>
                  <div>PLEASE TRY A DIFFERENT SEARCH</div>
                </div>
                <div class="search-items">
                  <div class="search-item" data-id="23789">
                    <div class="row info">
                      <div class="order">1</div>
                      <div class="col-xs-3 col-sm-2 col-img"><a
                        href="/practices/canada/prince-edward-island/charlottetown/charlottetown-veterinary-clinic-23789"><img
                        alt="" class="img-responsive image"
                        src="https://images-topvet.azureedge.net/images/3a53a544-3196-4fce-b2a5-d33c69be2327-thumb"></a>
                      </div>
                      <div class="col-xs-9 col-sm-10">
                        <div class="row first-row">
                          <div class="col-lg-8 col-md-6 col-sm-8"><a
                            href="/practices/canada/prince-edward-island/charlottetown/charlottetown-veterinary-clinic-23789"
                            class="name">Charlottetown Veterinary Clinic</a></div>
                          <div class="col-lg-4 col-md-6 col-sm-4 rating-col">
                            <div class="rating  ">
                              <div class="rating-star"><span
                                class="rating-star-selected"></span></div>
                              <div class="rating-star"><span
                                class="rating-star-selected"></span></div>
                              <div class="rating-star"><span
                                class="rating-star-selected"></span></div>
                              <div class="rating-star"><span
                                class="rating-star-selected"></span></div>
                              <div class="rating-star"><span
                                class="rating-star-selected"></span></div>
                              <span class="reviews-count">(29)</span></div>
                          </div>
                        </div>
                        <div class="row hidden-xs">
                          <div class="col-xs-12">
                            <div class="last-review">"These guys are great! I've taken my
                              bulldog there for ear infection and they have been great. Super
                              friendly staff, clean facilities. Glad we found..."
                            </div>
                          </div>
                        </div>
                        <div class="row address-info-row">
                          <div class="clearfix visible-md-block visible-lg-block"></div>
                          <div class="col-md-5 col-lg-6 col-sm-6 no-padding-right">
                            <div class="address1">5 Kirkwood Dr</div>
                            <div class="address2">Charlottetown C1A 2T4</div>
                            <div class="distance"><span class="text">Distance:</span> 22.8 miles
                            </div>
                          </div>
                          <div class="col-md-7 col-lg-6 col-sm-6 text-right buttons hidden-xs">
                            <div class="dropdown-block">
                              <button class="btn btn-five  " type="button"
                                      data-toggle="dropdown"><i
                                class="icon-search-results-icon3"></i></button>
                              <ul class="dropdown-menu">
                                <li><a class="tel" href="tel:(902) 892-4287">(902)
                                  892-4287</a></li>
                              </ul>
                            </div>
                            <a href="/practices/canada/prince-edward-island/charlottetown/charlottetown-veterinary-clinic-23789"
                               class="btn btn-more">MORE <i
                              class="icon-search-results-icon4 normal"></i><i
                              class="icon-next-arrow hover"></i></a></div>
                        </div>
                      </div>
                    </div>
                    <div class="row visible-xs">
                      <div class="col-xs-12 col-img-xs">
                        <div class="last-review">"These guys are great! I've taken my bulldog there
                          for ear infection and they have been great. Super friendly staff, clean
                          facilities. Glad we found..."
                        </div>
                      </div>
                    </div>
                    <div class="row buttons-row visible-xs">
                      <div class="col-xs-6 col-img">
                        <div class="dropdown-block">
                          <button class="btn btn-five  " type="button" data-toggle="dropdown"><i
                            class="icon-search-results-icon3"></i></button>
                          <ul class="dropdown-menu">
                            <li><a href="tel:(902) 892-4287">(902) 892-4287</a></li>
                          </ul>
                        </div>
                      </div>
                      <div class="col-xs-6"><a
                        href="/practices/canada/prince-edward-island/charlottetown/charlottetown-veterinary-clinic-23789"
                        class="btn btn-more">MORE <i class="icon-search-results-icon4 normal"></i><i
                        class="icon-next-arrow hover"></i></a></div>
                    </div>
                  </div>
                  <div class="search-item" data-id="23796">
                    <div class="row info">
                      <div class="order">2</div>
                      <div class="col-xs-3 col-sm-2 col-img"><a
                        href="/practices/canada/prince-edward-island/new-perth/new-perth-animal-hospital-23796"><img
                        alt="" class="img-responsive image"
                        src="https://images-topvet.azureedge.net/images/a00ef839-e1dd-4b57-987c-f15b596bba31-thumb"></a>
                      </div>
                      <div class="col-xs-9 col-sm-10">
                        <div class="row first-row">
                          <div class="col-lg-8 col-md-6 col-sm-8"><a
                            href="/practices/canada/prince-edward-island/new-perth/new-perth-animal-hospital-23796"
                            class="name">New Perth Animal Hospital</a></div>
                          <div class="col-lg-4 col-md-6 col-sm-4 rating-col">
                            <div class="rating  ">
                              <div class="rating-star"><span
                                class="rating-star-selected"></span></div>
                              <div class="rating-star"><span
                                class="rating-star-selected"></span></div>
                              <div class="rating-star"><span
                                class="rating-star-selected"></span></div>
                              <div class="rating-star"><span
                                class="rating-star-selected"></span></div>
                              <div class="rating-star"><span
                                class="rating-star-selected"></span></div>
                              <span class="reviews-count">(15)</span></div>
                          </div>
                        </div>
                        <div class="row hidden-xs">
                          <div class="col-xs-12">
                            <div class="last-review">"Very knowledgeable in what they do! Very
                              friendly &amp; will help you with any issues or questions you
                              may have. They truly are in it for the love of anim..."
                            </div>
                          </div>
                        </div>
                        <div class="row address-info-row">
                          <div class="clearfix visible-md-block visible-lg-block"></div>
                          <div class="col-md-5 col-lg-6 col-sm-6 no-padding-right">
                            <div class="address1">3188 Georgetown Rd Rte. #3</div>
                            <div class="address2">New Perth C0A 1G0</div>
                            <div class="distance"><span class="text">Distance:</span> 39.6 miles
                            </div>
                          </div>
                          <div class="col-md-7 col-lg-6 col-sm-6 text-right buttons hidden-xs">
                            <div class="dropdown-block">
                              <button class="btn btn-five  " type="button"
                                      data-toggle="dropdown"><i
                                class="icon-search-results-icon3"></i></button>
                              <ul class="dropdown-menu">
                                <li><a class="tel" href="tel:(902) 838-1800">(902)
                                  838-1800</a></li>
                              </ul>
                            </div>
                            <a href="/practices/canada/prince-edward-island/new-perth/new-perth-animal-hospital-23796"
                               class="btn btn-more">MORE <i
                              class="icon-search-results-icon4 normal"></i><i
                              class="icon-next-arrow hover"></i></a></div>
                        </div>
                      </div>
                    </div>
                    <div class="row visible-xs">
                      <div class="col-xs-12 col-img-xs">
                        <div class="last-review">"Very knowledgeable in what they do! Very friendly
                          &amp; will help you with any issues or questions you may have. They
                          truly are in it for the love of anim..."
                        </div>
                      </div>
                    </div>
                    <div class="row buttons-row visible-xs">
                      <div class="col-xs-6 col-img">
                        <div class="dropdown-block">
                          <button class="btn btn-five  " type="button" data-toggle="dropdown"><i
                            class="icon-search-results-icon3"></i></button>
                          <ul class="dropdown-menu">
                            <li><a href="tel:(902) 838-1800">(902) 838-1800</a></li>
                          </ul>
                        </div>
                      </div>
                      <div class="col-xs-6"><a
                        href="/practices/canada/prince-edward-island/new-perth/new-perth-animal-hospital-23796"
                        class="btn btn-more">MORE <i class="icon-search-results-icon4 normal"></i><i
                        class="icon-next-arrow hover"></i></a></div>
                    </div>
                  </div>
                  <div class="search-item" data-id="23798">
                    <div class="row info">
                      <div class="order">3</div>
                      <div class="col-xs-3 col-sm-2 col-img"><a
                        href="/practices/canada/prince-edward-island/stratford/southport-animal-hospital-23798"><img
                        alt="" class="img-responsive image"
                        src="https://images-topvet.azureedge.net/images/business-profile-icon1.png"></a>
                      </div>
                      <div class="col-xs-9 col-sm-10">
                        <div class="row first-row">
                          <div class="col-lg-8 col-md-6 col-sm-8"><a
                            href="/practices/canada/prince-edward-island/stratford/southport-animal-hospital-23798"
                            class="name">Southport Animal Hospital</a></div>
                          <div class="col-lg-4 col-md-6 col-sm-4 rating-col">
                            <div class="rating  ">
                              <div class="rating-star"><span
                                class="rating-star-selected"></span></div>
                              <div class="rating-star"><span
                                class="rating-star-selected"></span></div>
                              <div class="rating-star"><span
                                class="rating-star-selected"></span></div>
                              <div class="rating-star"><span
                                class="rating-star-selected"></span></div>
                              <div class="rating-star"><span
                                class="rating-star-selected"></span></div>
                              <span class="reviews-count">(10)</span></div>
                          </div>
                        </div>
                        <div class="row hidden-xs">
                          <div class="col-xs-12">
                            <div class="last-review">"Great pet care"</div>
                          </div>
                        </div>
                        <div class="row address-info-row">
                          <div class="clearfix visible-md-block visible-lg-block"></div>
                          <div class="col-md-5 col-lg-6 col-sm-6 no-padding-right">
                            <div class="address1">23 Stratford Road</div>
                            <div class="address2">Stratford C1B 1T4</div>
                            <div class="distance"><span class="text">Distance:</span> 24.7 miles
                            </div>
                          </div>
                          <div class="col-md-7 col-lg-6 col-sm-6 text-right buttons hidden-xs">
                            <div class="dropdown-block">
                              <button class="btn btn-five  " type="button"
                                      data-toggle="dropdown"><i
                                class="icon-search-results-icon3"></i></button>
                              <ul class="dropdown-menu">
                                <li><a class="tel" href="tel:(902) 569-4343">(902)
                                  569-4343</a></li>
                              </ul>
                            </div>
                            <a href="/practices/canada/prince-edward-island/stratford/southport-animal-hospital-23798"
                               class="btn btn-more">MORE <i
                              class="icon-search-results-icon4 normal"></i><i
                              class="icon-next-arrow hover"></i></a></div>
                        </div>
                      </div>
                    </div>
                    <div class="row visible-xs">
                      <div class="col-xs-12 col-img-xs">
                        <div class="last-review">"Great pet care"</div>
                      </div>
                    </div>
                    <div class="row buttons-row visible-xs">
                      <div class="col-xs-6 col-img">
                        <div class="dropdown-block">
                          <button class="btn btn-five  " type="button" data-toggle="dropdown"><i
                            class="icon-search-results-icon3"></i></button>
                          <ul class="dropdown-menu">
                            <li><a href="tel:(902) 569-4343">(902) 569-4343</a></li>
                          </ul>
                        </div>
                      </div>
                      <div class="col-xs-6"><a
                        href="/practices/canada/prince-edward-island/stratford/southport-animal-hospital-23798"
                        class="btn btn-more">MORE <i class="icon-search-results-icon4 normal"></i><i
                        class="icon-next-arrow hover"></i></a></div>
                    </div>
                  </div>
                  <div class="search-item" data-id="23795">
                    <div class="row info">
                      <div class="order">4</div>
                      <div class="col-xs-3 col-sm-2 col-img"><a
                        href="/practices/canada/prince-edward-island/mount-stewart/veterinary-services-runyon-23795"><img
                        alt="" class="img-responsive image"
                        src="https://images-topvet.azureedge.net/images/9b01de71-a7dc-4273-b317-72691b4c7738-thumb"></a>
                      </div>
                      <div class="col-xs-9 col-sm-10">
                        <div class="row first-row">
                          <div class="col-lg-8 col-md-6 col-sm-8"><a
                            href="/practices/canada/prince-edward-island/mount-stewart/veterinary-services-runyon-23795"
                            class="name">Veterinary Services Runyon</a></div>
                          <div class="col-lg-4 col-md-6 col-sm-4 rating-col">
                            <div class="rating  ">
                              <div class="rating-star"><span
                                class="rating-star-selected"></span></div>
                              <div class="rating-star"><span
                                class="rating-star-selected"></span></div>
                              <div class="rating-star"><span
                                class="rating-star-selected"></span></div>
                              <div class="rating-star"><span
                                class="rating-star-selected"></span></div>
                              <div class="rating-star"><span
                                class="rating-star-selected"></span></div>
                              <span class="reviews-count">(1)</span></div>
                          </div>
                        </div>
                        <div class="row hidden-xs">
                          <div class="col-xs-12">
                            <div class="last-review">"Dr Runyon was the 1st small animal surgery
                              hired at UPEI AVC... she became their poster girl for young
                              people to consider the Veterinary Medicine Prog..."
                            </div>
                          </div>
                        </div>
                        <div class="row address-info-row">
                          <div class="clearfix visible-md-block visible-lg-block"></div>
                          <div class="col-md-5 col-lg-6 col-sm-6 no-padding-right">
                            <div class="address1">14 Garden Lane</div>
                            <div class="address2">Mount Stewart C0A 1T0</div>
                            <div class="distance"><span class="text">Distance:</span> 22 miles
                            </div>
                          </div>
                          <div class="col-md-7 col-lg-6 col-sm-6 text-right buttons hidden-xs">
                            <div class="dropdown-block">
                              <button class="btn btn-five  " type="button"
                                      data-toggle="dropdown"><i
                                class="icon-search-results-icon3"></i></button>
                              <ul class="dropdown-menu">
                                <li><a class="tel" href="tel:(888) 822-4305">(888)
                                  822-4305</a></li>
                              </ul>
                            </div>
                            <a href="/practices/canada/prince-edward-island/mount-stewart/veterinary-services-runyon-23795"
                               class="btn btn-more">MORE <i
                              class="icon-search-results-icon4 normal"></i><i
                              class="icon-next-arrow hover"></i></a></div>
                        </div>
                      </div>
                    </div>
                    <div class="row visible-xs">
                      <div class="col-xs-12 col-img-xs">
                        <div class="last-review">"Dr Runyon was the 1st small animal surgery hired
                          at UPEI AVC... she became their poster girl for young people to consider
                          the Veterinary Medicine Prog..."
                        </div>
                      </div>
                    </div>
                    <div class="row buttons-row visible-xs">
                      <div class="col-xs-6 col-img">
                        <div class="dropdown-block">
                          <button class="btn btn-five  " type="button" data-toggle="dropdown"><i
                            class="icon-search-results-icon3"></i></button>
                          <ul class="dropdown-menu">
                            <li><a href="tel:(888) 822-4305">(888) 822-4305</a></li>
                          </ul>
                        </div>
                      </div>
                      <div class="col-xs-6"><a
                        href="/practices/canada/prince-edward-island/mount-stewart/veterinary-services-runyon-23795"
                        class="btn btn-more">MORE <i class="icon-search-results-icon4 normal"></i><i
                        class="icon-next-arrow hover"></i></a></div>
                    </div>
                  </div>
                  <div class="search-item" data-id="23792">
                    <div class="row info">
                      <div class="order">5</div>
                      <div class="col-xs-3 col-sm-2 col-img"><a
                        href="/practices/canada/prince-edward-island/montague/kim-macdonald-23792"><img
                        alt="" class="img-responsive image"
                        src="https://images-topvet.azureedge.net/images/75234d85-1b5f-4ab3-81ea-efaaee562e7f-thumb"></a>
                      </div>
                      <div class="col-xs-9 col-sm-10">
                        <div class="row first-row">
                          <div class="col-lg-8 col-md-6 col-sm-8"><a
                            href="/practices/canada/prince-edward-island/montague/kim-macdonald-23792"
                            class="name">Kim Macdonald</a></div>
                          <div class="col-lg-4 col-md-6 col-sm-4 rating-col">
                            <div class="rating  ">
                              <div class="rating-star"><span
                                class="rating-star-selected"></span></div>
                              <div class="rating-star"><span
                                class="rating-star-selected"></span></div>
                              <div class="rating-star"><span
                                class="rating-star-selected"></span></div>
                              <div class="rating-star"><span
                                class="rating-star-selected"></span></div>
                              <div class="rating-star"><span
                                class="rating-star-selected"></span></div>
                              <span class="reviews-count">(1)</span></div>
                          </div>
                        </div>
                        <div class="row hidden-xs">
                          <div class="col-xs-12">
                            <div class="last-review">"Kim isn't even on my end of the Island.
                              But she is willing to come when needed (ASAP.) Also willing to
                              drop refills in prescriptions in a location in ..."
                            </div>
                          </div>
                        </div>
                        <div class="row address-info-row">
                          <div class="clearfix visible-md-block visible-lg-block"></div>
                          <div class="col-md-5 col-lg-6 col-sm-6 no-padding-right">
                            <div class="address1">Queens Rd</div>
                            <div class="address2">Montague C0A 1R0</div>
                            <div class="distance"><span class="text">Distance:</span> 41.4 miles
                            </div>
                          </div>
                          <div class="col-md-7 col-lg-6 col-sm-6 text-right buttons hidden-xs">
                            <div class="dropdown-block">
                              <button class="btn btn-five  " type="button"
                                      data-toggle="dropdown"><i
                                class="icon-search-results-icon3"></i></button>
                              <ul class="dropdown-menu">
                                <li><a class="tel" href="tel:(902) 629-9416">(902)
                                  629-9416</a></li>
                              </ul>
                            </div>
                            <a href="/practices/canada/prince-edward-island/montague/kim-macdonald-23792"
                               class="btn btn-more">MORE <i
                              class="icon-search-results-icon4 normal"></i><i
                              class="icon-next-arrow hover"></i></a></div>
                        </div>
                      </div>
                    </div>
                    <div class="row visible-xs">
                      <div class="col-xs-12 col-img-xs">
                        <div class="last-review">"Kim isn't even on my end of the Island. But she is
                          willing to come when needed (ASAP.) Also willing to drop refills in
                          prescriptions in a location in ..."
                        </div>
                      </div>
                    </div>
                    <div class="row buttons-row visible-xs">
                      <div class="col-xs-6 col-img">
                        <div class="dropdown-block">
                          <button class="btn btn-five  " type="button" data-toggle="dropdown"><i
                            class="icon-search-results-icon3"></i></button>
                          <ul class="dropdown-menu">
                            <li><a href="tel:(902) 629-9416">(902) 629-9416</a></li>
                          </ul>
                        </div>
                      </div>
                      <div class="col-xs-6"><a
                        href="/practices/canada/prince-edward-island/montague/kim-macdonald-23792"
                        class="btn btn-more">MORE <i class="icon-search-results-icon4 normal"></i><i
                        class="icon-next-arrow hover"></i></a></div>
                    </div>
                  </div>
                  <div class="search-item" data-id="23788">
                    <div class="row info">
                      <div class="order">6</div>
                      <div class="col-xs-3 col-sm-2 col-img"><a
                        href="/practices/canada/prince-edward-island/charlottetown/abegweit-animal-hospital-23788"><img
                        alt="" class="img-responsive image"
                        src="https://images-topvet.azureedge.net/images/1db8629f-a283-419f-a44b-434b6854d9f2-thumb"></a>
                      </div>
                      <div class="col-xs-9 col-sm-10">
                        <div class="row first-row">
                          <div class="col-lg-8 col-md-6 col-sm-8"><a
                            href="/practices/canada/prince-edward-island/charlottetown/abegweit-animal-hospital-23788"
                            class="name">Abegweit Animal Hospital</a></div>
                          <div class="col-lg-4 col-md-6 col-sm-4 rating-col">
                            <div class="rating  ">
                              <div class="rating-star"><span
                                class="rating-star-selected"></span></div>
                              <div class="rating-star"><span
                                class="rating-star-selected"></span></div>
                              <div class="rating-star"><span
                                class="rating-star-selected"></span></div>
                              <div class="rating-star"><span
                                class="rating-star-selected"></span></div>
                              <div class="rating-star"><span class="rating-star-selected"
                                                             style="width:96%"></span></div>
                              <span class="reviews-count">(27)</span></div>
                          </div>
                        </div>
                        <div class="row hidden-xs">
                          <div class="col-xs-12">
                            <div class="last-review">"Wonderful staff! We have had a wonderful
                              experience with them over the years and we recommend this place
                              to everyone. I used to go to the Charlottetow..."
                            </div>
                          </div>
                        </div>
                        <div class="row address-info-row">
                          <div class="clearfix visible-md-block visible-lg-block"></div>
                          <div class="col-md-5 col-lg-6 col-sm-6 no-padding-right">
                            <div class="address1">24 F J Macauley Crt</div>
                            <div class="address2">Charlottetown C1A 9M7</div>
                            <div class="distance"><span class="text">Distance:</span> 23 miles
                            </div>
                          </div>
                          <div class="col-md-7 col-lg-6 col-sm-6 text-right buttons hidden-xs">
                            <div class="dropdown-block">
                              <button class="btn btn-five  " type="button"
                                      data-toggle="dropdown"><i
                                class="icon-search-results-icon3"></i></button>
                              <ul class="dropdown-menu">
                                <li><a class="tel" href="tel:(902) 892-3538">(902)
                                  892-3538</a></li>
                              </ul>
                            </div>
                            <a href="/practices/canada/prince-edward-island/charlottetown/abegweit-animal-hospital-23788"
                               class="btn btn-more">MORE <i
                              class="icon-search-results-icon4 normal"></i><i
                              class="icon-next-arrow hover"></i></a></div>
                        </div>
                      </div>
                    </div>
                    <div class="row visible-xs">
                      <div class="col-xs-12 col-img-xs">
                        <div class="last-review">"Wonderful staff! We have had a wonderful
                          experience with them over the years and we recommend this place to
                          everyone. I used to go to the Charlottetow..."
                        </div>
                      </div>
                    </div>
                    <div class="row buttons-row visible-xs">
                      <div class="col-xs-6 col-img">
                        <div class="dropdown-block">
                          <button class="btn btn-five  " type="button" data-toggle="dropdown"><i
                            class="icon-search-results-icon3"></i></button>
                          <ul class="dropdown-menu">
                            <li><a href="tel:(902) 892-3538">(902) 892-3538</a></li>
                          </ul>
                        </div>
                      </div>
                      <div class="col-xs-6"><a
                        href="/practices/canada/prince-edward-island/charlottetown/abegweit-animal-hospital-23788"
                        class="btn btn-more">MORE <i class="icon-search-results-icon4 normal"></i><i
                        class="icon-next-arrow hover"></i></a></div>
                    </div>
                  </div>
                  <div class="search-item" data-id="23787">
                    <div class="row info">
                      <div class="order">7</div>
                      <div class="col-xs-3 col-sm-2 col-img"><a
                        href="/practices/canada/prince-edward-island/charlottetown/miltonvale-park-veterinary-clinic-23787"><img
                        alt="" class="img-responsive image"
                        src="https://images-topvet.azureedge.net/images/business-profile-icon1.png"></a>
                      </div>
                      <div class="col-xs-9 col-sm-10">
                        <div class="row first-row">
                          <div class="col-lg-8 col-md-6 col-sm-8"><a
                            href="/practices/canada/prince-edward-island/charlottetown/miltonvale-park-veterinary-clinic-23787"
                            class="name">Miltonvale Park Veterinary Clinic</a></div>
                          <div class="col-lg-4 col-md-6 col-sm-4 rating-col">
                            <div class="rating  ">
                              <div class="rating-star"><span
                                class="rating-star-selected"></span></div>
                              <div class="rating-star"><span
                                class="rating-star-selected"></span></div>
                              <div class="rating-star"><span
                                class="rating-star-selected"></span></div>
                              <div class="rating-star"><span
                                class="rating-star-selected"></span></div>
                              <div class="rating-star"><span class="rating-star-selected"
                                                             style="width:75%"></span></div>
                              <span class="reviews-count">(8)</span></div>
                          </div>
                        </div>
                        <div class="row hidden-xs">
                          <div class="col-xs-12">
                            <div class="last-review">"Waiting for results report on our baby
                              girl Levi Who passed in your care! Please contact me !"
                            </div>
                          </div>
                        </div>
                        <div class="row address-info-row">
                          <div class="clearfix visible-md-block visible-lg-block"></div>
                          <div class="col-md-5 col-lg-6 col-sm-6 no-padding-right">
                            <div class="address1">950 Lower Malpeque Road</div>
                            <div class="address2">Charlottetown C1E 1Z4</div>
                            <div class="distance"><span class="text">Distance:</span> 18 miles
                            </div>
                          </div>
                          <div class="col-md-7 col-lg-6 col-sm-6 text-right buttons hidden-xs">
                            <div class="dropdown-block">
                              <button class="btn btn-five  " type="button"
                                      data-toggle="dropdown"><i
                                class="icon-search-results-icon3"></i></button>
                              <ul class="dropdown-menu">
                                <li><a class="tel" href="tel:(902) 368-8800">(902)
                                  368-8800</a></li>
                              </ul>
                            </div>
                            <a href="/practices/canada/prince-edward-island/charlottetown/miltonvale-park-veterinary-clinic-23787"
                               class="btn btn-more">MORE <i
                              class="icon-search-results-icon4 normal"></i><i
                              class="icon-next-arrow hover"></i></a></div>
                        </div>
                      </div>
                    </div>
                    <div class="row visible-xs">
                      <div class="col-xs-12 col-img-xs">
                        <div class="last-review">"Waiting for results report on our baby girl Levi
                          Who passed in your care! Please contact me !"
                        </div>
                      </div>
                    </div>
                    <div class="row buttons-row visible-xs">
                      <div class="col-xs-6 col-img">
                        <div class="dropdown-block">
                          <button class="btn btn-five  " type="button" data-toggle="dropdown"><i
                            class="icon-search-results-icon3"></i></button>
                          <ul class="dropdown-menu">
                            <li><a href="tel:(902) 368-8800">(902) 368-8800</a></li>
                          </ul>
                        </div>
                      </div>
                      <div class="col-xs-6"><a
                        href="/practices/canada/prince-edward-island/charlottetown/miltonvale-park-veterinary-clinic-23787"
                        class="btn btn-more">MORE <i class="icon-search-results-icon4 normal"></i><i
                        class="icon-next-arrow hover"></i></a></div>
                    </div>
                  </div>
                  <div class="search-item" data-id="23799">
                    <div class="row info">
                      <div class="order">8</div>
                      <div class="col-xs-3 col-sm-2 col-img"><a
                        href="/practices/canada/prince-edward-island/summerside/summerside-animal-hospital-23799"><img
                        alt="" class="img-responsive image"
                        src="https://images-topvet.azureedge.net/images/3bc9b2c4-321a-48ea-8e6b-5556146de2c8-thumb"></a>
                      </div>
                      <div class="col-xs-9 col-sm-10">
                        <div class="row first-row">
                          <div class="col-lg-8 col-md-6 col-sm-8"><a
                            href="/practices/canada/prince-edward-island/summerside/summerside-animal-hospital-23799"
                            class="name">Summerside Animal Hospital</a></div>
                          <div class="col-lg-4 col-md-6 col-sm-4 rating-col">
                            <div class="rating  ">
                              <div class="rating-star"><span
                                class="rating-star-selected"></span></div>
                              <div class="rating-star"><span
                                class="rating-star-selected"></span></div>
                              <div class="rating-star"><span
                                class="rating-star-selected"></span></div>
                              <div class="rating-star"><span
                                class="rating-star-selected"></span></div>
                              <div class="rating-star"><span class="rating-star-selected"
                                                             style="width:68%"></span></div>
                              <span class="reviews-count">(31)</span></div>
                          </div>
                        </div>
                        <div class="row hidden-xs">
                          <div class="col-xs-12">
                            <div class="last-review">"They were excellent with my Ms.Katie"
                            </div>
                          </div>
                        </div>
                        <div class="row address-info-row">
                          <div class="clearfix visible-md-block visible-lg-block"></div>
                          <div class="col-md-5 col-lg-6 col-sm-6 no-padding-right">
                            <div class="address1">492 Granville Street</div>
                            <div class="address2">Summerside C1N 5Y1</div>
                            <div class="distance"><span class="text">Distance:</span> 18.6 miles
                            </div>
                          </div>
                          <div class="col-md-7 col-lg-6 col-sm-6 text-right buttons hidden-xs">
                            <div class="dropdown-block">
                              <button class="btn btn-five  " type="button"
                                      data-toggle="dropdown"><i
                                class="icon-search-results-icon3"></i></button>
                              <ul class="dropdown-menu">
                                <li><a class="tel" href="tel:(902) 436-2297">(902)
                                  436-2297</a></li>
                              </ul>
                            </div>
                            <a href="/practices/canada/prince-edward-island/summerside/summerside-animal-hospital-23799"
                               class="btn btn-more">MORE <i
                              class="icon-search-results-icon4 normal"></i><i
                              class="icon-next-arrow hover"></i></a></div>
                        </div>
                      </div>
                    </div>
                    <div class="row visible-xs">
                      <div class="col-xs-12 col-img-xs">
                        <div class="last-review">"They were excellent with my Ms.Katie"</div>
                      </div>
                    </div>
                    <div class="row buttons-row visible-xs">
                      <div class="col-xs-6 col-img">
                        <div class="dropdown-block">
                          <button class="btn btn-five  " type="button" data-toggle="dropdown"><i
                            class="icon-search-results-icon3"></i></button>
                          <ul class="dropdown-menu">
                            <li><a href="tel:(902) 436-2297">(902) 436-2297</a></li>
                          </ul>
                        </div>
                      </div>
                      <div class="col-xs-6"><a
                        href="/practices/canada/prince-edward-island/summerside/summerside-animal-hospital-23799"
                        class="btn btn-more">MORE <i class="icon-search-results-icon4 normal"></i><i
                        class="icon-next-arrow hover"></i></a></div>
                    </div>
                  </div>
                  <div class="search-item" data-id="23790">
                    <div class="row info">
                      <div class="order">9</div>
                      <div class="col-xs-3 col-sm-2 col-img"><a
                        href="/practices/canada/prince-edward-island/cornwall/cornwall-veterinary-clinic-23790"><img
                        alt="" class="img-responsive image"
                        src="https://images-topvet.azureedge.net/images/business-profile-icon1.png"></a>
                      </div>
                      <div class="col-xs-9 col-sm-10">
                        <div class="row first-row">
                          <div class="col-lg-8 col-md-6 col-sm-8"><a
                            href="/practices/canada/prince-edward-island/cornwall/cornwall-veterinary-clinic-23790"
                            class="name">Cornwall Veterinary Clinic</a></div>
                          <div class="col-lg-4 col-md-6 col-sm-4 rating-col">
                            <div class="rating  ">
                              <div class="rating-star"><span
                                class="rating-star-selected"></span></div>
                              <div class="rating-star"><span
                                class="rating-star-selected"></span></div>
                              <div class="rating-star"><span
                                class="rating-star-selected"></span></div>
                              <div class="rating-star"><span
                                class="rating-star-selected"></span></div>
                              <div class="rating-star"><span class="rating-star-selected"
                                                             style="width:67%"></span></div>
                              <span class="reviews-count">(6)</span></div>
                          </div>
                        </div>
                        <div class="row hidden-xs">
                          <div class="col-xs-12">
                            <div class="last-review">"Great service and a friendly staff. Always
                              trying to make it work for you and your pet."
                            </div>
                          </div>
                        </div>
                        <div class="row address-info-row">
                          <div class="clearfix visible-md-block visible-lg-block"></div>
                          <div class="col-md-5 col-lg-6 col-sm-6 no-padding-right">
                            <div class="address1">375 Trans-Canada Highway</div>
                            <div class="address2">Cornwall C0A 1H0</div>
                            <div class="distance"><span class="text">Distance:</span> 21.5 miles
                            </div>
                          </div>
                          <div class="col-md-7 col-lg-6 col-sm-6 text-right buttons hidden-xs">
                            <div class="dropdown-block">
                              <button class="btn btn-five  " type="button"
                                      data-toggle="dropdown"><i
                                class="icon-search-results-icon3"></i></button>
                              <ul class="dropdown-menu">
                                <li><a class="tel" href="tel:(902) 368-8374">(902)
                                  368-8374</a></li>
                              </ul>
                            </div>
                            <a href="/practices/canada/prince-edward-island/cornwall/cornwall-veterinary-clinic-23790"
                               class="btn btn-more">MORE <i
                              class="icon-search-results-icon4 normal"></i><i
                              class="icon-next-arrow hover"></i></a></div>
                        </div>
                      </div>
                    </div>
                    <div class="row visible-xs">
                      <div class="col-xs-12 col-img-xs">
                        <div class="last-review">"Great service and a friendly staff. Always trying
                          to make it work for you and your pet."
                        </div>
                      </div>
                    </div>
                    <div class="row buttons-row visible-xs">
                      <div class="col-xs-6 col-img">
                        <div class="dropdown-block">
                          <button class="btn btn-five  " type="button" data-toggle="dropdown"><i
                            class="icon-search-results-icon3"></i></button>
                          <ul class="dropdown-menu">
                            <li><a href="tel:(902) 368-8374">(902) 368-8374</a></li>
                          </ul>
                        </div>
                      </div>
                      <div class="col-xs-6"><a
                        href="/practices/canada/prince-edward-island/cornwall/cornwall-veterinary-clinic-23790"
                        class="btn btn-more">MORE <i class="icon-search-results-icon4 normal"></i><i
                        class="icon-next-arrow hover"></i></a></div>
                    </div>
                  </div>
                  <div class="search-item" data-id="23793">
                    <div class="row info">
                      <div class="order">10</div>
                      <div class="col-xs-3 col-sm-2 col-img"><a
                        href="/practices/canada/prince-edward-island/montague/brudenell-animal-hospital-23793"><img
                        alt="" class="img-responsive image"
                        src="https://images-topvet.azureedge.net/images/business-profile-icon1.png"></a>
                      </div>
                      <div class="col-xs-9 col-sm-10">
                        <div class="row first-row">
                          <div class="col-lg-8 col-md-6 col-sm-8"><a
                            href="/practices/canada/prince-edward-island/montague/brudenell-animal-hospital-23793"
                            class="name">Brudenell Animal Hospital</a></div>
                          <div class="col-lg-4 col-md-6 col-sm-4 rating-col">
                            <div class="rating  ">
                              <div class="rating-star"><span
                                class="rating-star-selected"></span></div>
                              <div class="rating-star"><span
                                class="rating-star-selected"></span></div>
                              <div class="rating-star"><span
                                class="rating-star-selected"></span></div>
                              <div class="rating-star"><span
                                class="rating-star-selected"></span></div>
                              <div class="rating-star"><span class="rating-star-selected"
                                                             style="width:67%"></span></div>
                              <span class="reviews-count">(3)</span></div>
                          </div>
                        </div>
                        <div class="row hidden-xs">
                          <div class="col-xs-12">
                            <div class="last-review">"Excellent care and dedicated staff. It's
                              the only place we take our furred family members for the best in
                              Veterinary services."
                            </div>
                          </div>
                        </div>
                        <div class="row address-info-row">
                          <div class="clearfix visible-md-block visible-lg-block"></div>
                          <div class="col-md-5 col-lg-6 col-sm-6 no-padding-right">
                            <div class="address1">2030 Robertson Road</div>
                            <div class="address2">Montague C0A 1R0</div>
                            <div class="distance"><span class="text">Distance:</span> 43.5 miles
                            </div>
                          </div>
                          <div class="col-md-7 col-lg-6 col-sm-6 text-right buttons hidden-xs">
                            <div class="dropdown-block">
                              <button class="btn btn-five  " type="button"
                                      data-toggle="dropdown"><i
                                class="icon-search-results-icon3"></i></button>
                              <ul class="dropdown-menu">
                                <li><a class="tel" href="tel:(902) 838-2276">(902)
                                  838-2276</a></li>
                              </ul>
                            </div>
                            <a href="/practices/canada/prince-edward-island/montague/brudenell-animal-hospital-23793"
                               class="btn btn-more">MORE <i
                              class="icon-search-results-icon4 normal"></i><i
                              class="icon-next-arrow hover"></i></a></div>
                        </div>
                      </div>
                    </div>
                    <div class="row visible-xs">
                      <div class="col-xs-12 col-img-xs">
                        <div class="last-review">"Excellent care and dedicated staff. It's the only
                          place we take our furred family members for the best in Veterinary
                          services."
                        </div>
                      </div>
                    </div>
                    <div class="row buttons-row visible-xs">
                      <div class="col-xs-6 col-img">
                        <div class="dropdown-block">
                          <button class="btn btn-five  " type="button" data-toggle="dropdown"><i
                            class="icon-search-results-icon3"></i></button>
                          <ul class="dropdown-menu">
                            <li><a href="tel:(902) 838-2276">(902) 838-2276</a></li>
                          </ul>
                        </div>
                      </div>
                      <div class="col-xs-6"><a
                        href="/practices/canada/prince-edward-island/montague/brudenell-animal-hospital-23793"
                        class="btn btn-more">MORE <i class="icon-search-results-icon4 normal"></i><i
                        class="icon-next-arrow hover"></i></a></div>
                    </div>
                  </div>
                  <div class="search-item" data-id="23791">
                    <div class="row info">
                      <div class="order">11</div>
                      <div class="col-xs-3 col-sm-2 col-img"><a
                        href="/practices/canada/prince-edward-island/kensington/kensington-veterinary-clinic-23791"><img
                        alt="" class="img-responsive image"
                        src="https://images-topvet.azureedge.net/images/business-profile-icon1.png"></a>
                      </div>
                      <div class="col-xs-9 col-sm-10">
                        <div class="row first-row">
                          <div class="col-lg-8 col-md-6 col-sm-8"><a
                            href="/practices/canada/prince-edward-island/kensington/kensington-veterinary-clinic-23791"
                            class="name">Kensington Veterinary Clinic</a></div>
                          <div class="col-lg-4 col-md-6 col-sm-4 rating-col">
                            <div class="rating  ">
                              <div class="rating-star"><span
                                class="rating-star-selected"></span></div>
                              <div class="rating-star"><span
                                class="rating-star-selected"></span></div>
                              <div class="rating-star"><span
                                class="rating-star-selected"></span></div>
                              <div class="rating-star"><span
                                class="rating-star-selected"></span></div>
                              <div class="rating-star"><span class="rating-star-selected"
                                                             style="width:56.0000000000001%"></span>
                              </div>
                              <span class="reviews-count">(9)</span></div>
                          </div>
                        </div>
                        <div class="row hidden-xs">
                          <div class="col-xs-12">
                            <div class="last-review">"Excellent customer service during a very
                              difficult time for us."
                            </div>
                          </div>
                        </div>
                        <div class="row address-info-row">
                          <div class="clearfix visible-md-block visible-lg-block"></div>
                          <div class="col-md-5 col-lg-6 col-sm-6 no-padding-right">
                            <div class="address1">9 Park Rd</div>
                            <div class="address2">Kensington C0B 1M0</div>
                            <div class="distance"><span class="text">Distance:</span> 11.5 miles
                            </div>
                          </div>
                          <div class="col-md-7 col-lg-6 col-sm-6 text-right buttons hidden-xs">
                            <div class="dropdown-block">
                              <button class="btn btn-five  " type="button"
                                      data-toggle="dropdown"><i
                                class="icon-search-results-icon3"></i></button>
                              <ul class="dropdown-menu">
                                <li><a class="tel" href="tel:(902) 836-3410">(902)
                                  836-3410</a></li>
                              </ul>
                            </div>
                            <a href="/practices/canada/prince-edward-island/kensington/kensington-veterinary-clinic-23791"
                               class="btn btn-more">MORE <i
                              class="icon-search-results-icon4 normal"></i><i
                              class="icon-next-arrow hover"></i></a></div>
                        </div>
                      </div>
                    </div>
                    <div class="row visible-xs">
                      <div class="col-xs-12 col-img-xs">
                        <div class="last-review">"Excellent customer service during a very difficult
                          time for us."
                        </div>
                      </div>
                    </div>
                    <div class="row buttons-row visible-xs">
                      <div class="col-xs-6 col-img">
                        <div class="dropdown-block">
                          <button class="btn btn-five  " type="button" data-toggle="dropdown"><i
                            class="icon-search-results-icon3"></i></button>
                          <ul class="dropdown-menu">
                            <li><a href="tel:(902) 836-3410">(902) 836-3410</a></li>
                          </ul>
                        </div>
                      </div>
                      <div class="col-xs-6"><a
                        href="/practices/canada/prince-edward-island/kensington/kensington-veterinary-clinic-23791"
                        class="btn btn-more">MORE <i class="icon-search-results-icon4 normal"></i><i
                        class="icon-next-arrow hover"></i></a></div>
                    </div>
                  </div>
                  <div class="search-item" data-id="23794">
                    <div class="row info">
                      <div class="order">12</div>
                      <div class="col-xs-3 col-sm-2 col-img"><a
                        href="/practices/canada/prince-edward-island/montague/montague-veterinary-clinic-23794"><img
                        alt="" class="img-responsive image"
                        src="https://images-topvet.azureedge.net/images/be0f0db5-6342-45f4-9c28-ad6728157944-thumb"></a>
                      </div>
                      <div class="col-xs-9 col-sm-10">
                        <div class="row first-row">
                          <div class="col-lg-8 col-md-6 col-sm-8"><a
                            href="/practices/canada/prince-edward-island/montague/montague-veterinary-clinic-23794"
                            class="name">Montague Veterinary Clinic</a></div>
                          <div class="col-lg-4 col-md-6 col-sm-4 rating-col">
                            <div class="rating  ">
                              <div class="rating-star"><span
                                class="rating-star-selected"></span></div>
                              <div class="rating-star"><span
                                class="rating-star-selected"></span></div>
                              <div class="rating-star"><span
                                class="rating-star-selected"></span></div>
                              <div class="rating-star"><span
                                class="rating-star-selected"></span></div>
                              <div class="rating-star"><span class="rating-star-selected"
                                                             style="width:44%"></span></div>
                              <span class="reviews-count">(9)</span></div>
                          </div>
                        </div>
                        <div class="row hidden-xs">
                          <div class="col-xs-12">
                            <div class="last-review">"You are the best.You have the time and
                              patience for the Furbabies Moms and Dads. ..."
                            </div>
                          </div>
                        </div>
                        <div class="row address-info-row">
                          <div class="clearfix visible-md-block visible-lg-block"></div>
                          <div class="col-md-5 col-lg-6 col-sm-6 no-padding-right">
                            <div class="address1">100 Queens Road</div>
                            <div class="address2">Montague C0A 1R0</div>
                            <div class="distance"><span class="text">Distance:</span> 43.4 miles
                            </div>
                          </div>
                          <div class="col-md-7 col-lg-6 col-sm-6 text-right buttons hidden-xs">
                            <div class="dropdown-block">
                              <button class="btn btn-five  " type="button"
                                      data-toggle="dropdown"><i
                                class="icon-search-results-icon3"></i></button>
                              <ul class="dropdown-menu">
                                <li><a class="tel" href="tel:(902) 838-2281">(902)
                                  838-2281</a></li>
                              </ul>
                            </div>
                            <a href="/practices/canada/prince-edward-island/montague/montague-veterinary-clinic-23794"
                               class="btn btn-more">MORE <i
                              class="icon-search-results-icon4 normal"></i><i
                              class="icon-next-arrow hover"></i></a></div>
                        </div>
                      </div>
                    </div>
                    <div class="row visible-xs">
                      <div class="col-xs-12 col-img-xs">
                        <div class="last-review">"You are the best.You have the time and patience
                          for the Furbabies Moms and Dads. ..."
                        </div>
                      </div>
                    </div>
                    <div class="row buttons-row visible-xs">
                      <div class="col-xs-6 col-img">
                        <div class="dropdown-block">
                          <button class="btn btn-five  " type="button" data-toggle="dropdown"><i
                            class="icon-search-results-icon3"></i></button>
                          <ul class="dropdown-menu">
                            <li><a href="tel:(902) 838-2281">(902) 838-2281</a></li>
                          </ul>
                        </div>
                      </div>
                      <div class="col-xs-6"><a
                        href="/practices/canada/prince-edward-island/montague/montague-veterinary-clinic-23794"
                        class="btn btn-more">MORE <i class="icon-search-results-icon4 normal"></i><i
                        class="icon-next-arrow hover"></i></a></div>
                    </div>
                  </div>
                  <div class="search-item" data-id="23797">
                    <div class="row info">
                      <div class="order">13</div>
                      <div class="col-xs-3 col-sm-2 col-img"><a
                        href="/practices/canada/prince-edward-island/o'leary/west-prince-veterinary-service-23797"><img
                        alt="" class="img-responsive image"
                        src="https://images-topvet.azureedge.net/images/business-profile-icon1.png"></a>
                      </div>
                      <div class="col-xs-9 col-sm-10">
                        <div class="row first-row">
                          <div class="col-lg-8 col-md-6 col-sm-8"><a
                            href="/practices/canada/prince-edward-island/o'leary/west-prince-veterinary-service-23797"
                            class="name">West Prince Veterinary Service</a></div>
                          <div class="col-lg-4 col-md-6 col-sm-4 rating-col">
                            <div class="rating  ">
                              <div class="rating-star"><span
                                class="rating-star-selected"></span></div>
                              <div class="rating-star"><span
                                class="rating-star-selected"></span></div>
                              <div class="rating-star"><span
                                class="rating-star-selected"></span></div>
                              <div class="rating-star"><span
                                class="rating-star-selected"></span></div>
                              <div class="rating-star"><span class="rating-star-selected"
                                                             style="width:43%"></span></div>
                              <span class="reviews-count">(7)</span></div>
                          </div>
                        </div>
                        <div class="row hidden-xs">
                          <div class="col-xs-12">
                            <div class="last-review">"Loved the visit great staff."</div>
                          </div>
                        </div>
                        <div class="row address-info-row">
                          <div class="clearfix visible-md-block visible-lg-block"></div>
                          <div class="col-md-5 col-lg-6 col-sm-6 no-padding-right">
                            <div class="address1">46 East Dr</div>
                            <div class="address2">O'Leary C0B 1V0</div>
                            <div class="distance"><span class="text">Distance:</span> 40.9 miles
                            </div>
                          </div>
                          <div class="col-md-7 col-lg-6 col-sm-6 text-right buttons hidden-xs">
                            <div class="dropdown-block">
                              <button class="btn btn-five  " type="button"
                                      data-toggle="dropdown"><i
                                class="icon-search-results-icon3"></i></button>
                              <ul class="dropdown-menu">
                                <li><a class="tel" href="tel:(902) 859-2441">(902)
                                  859-2441</a></li>
                              </ul>
                            </div>
                            <a href="/practices/canada/prince-edward-island/o'leary/west-prince-veterinary-service-23797"
                               class="btn btn-more">MORE <i
                              class="icon-search-results-icon4 normal"></i><i
                              class="icon-next-arrow hover"></i></a></div>
                        </div>
                      </div>
                    </div>
                    <div class="row visible-xs">
                      <div class="col-xs-12 col-img-xs">
                        <div class="last-review">"Loved the visit great staff."</div>
                      </div>
                    </div>
                    <div class="row buttons-row visible-xs">
                      <div class="col-xs-6 col-img">
                        <div class="dropdown-block">
                          <button class="btn btn-five  " type="button" data-toggle="dropdown"><i
                            class="icon-search-results-icon3"></i></button>
                          <ul class="dropdown-menu">
                            <li><a href="tel:(902) 859-2441">(902) 859-2441</a></li>
                          </ul>
                        </div>
                      </div>
                      <div class="col-xs-6"><a
                        href="/practices/canada/prince-edward-island/o'leary/west-prince-veterinary-service-23797"
                        class="btn btn-more">MORE <i class="icon-search-results-icon4 normal"></i><i
                        class="icon-next-arrow hover"></i></a></div>
                    </div>
                  </div>
                  <div class="search-item" data-id="23800">
                    <div class="row info">
                      <div class="order">14</div>
                      <div class="col-xs-3 col-sm-2 col-img"><a
                        href="/practices/canada/prince-edward-island/summerside/gillis-veterinary-clinic-23800"><img
                        alt="" class="img-responsive image"
                        src="https://images-topvet.azureedge.net/images/business-profile-icon1.png"></a>
                      </div>
                      <div class="col-xs-9 col-sm-10">
                        <div class="row first-row">
                          <div class="col-lg-8 col-md-6 col-sm-8"><a
                            href="/practices/canada/prince-edward-island/summerside/gillis-veterinary-clinic-23800"
                            class="name">Gillis Veterinary Clinic</a></div>
                          <div class="col-lg-4 col-md-6 col-sm-4 rating-col">
                            <div class="rating  hide">
                              <div class="rating-star"></div>
                              <div class="rating-star"></div>
                              <div class="rating-star"></div>
                              <div class="rating-star"></div>
                              <div class="rating-star"></div>
                              <span class="reviews-count">(0)</span></div>
                          </div>
                        </div>
                        <div class="row address-info-row">
                          <div class="clearfix visible-md-block visible-lg-block"></div>
                          <div class="col-md-5 col-lg-6 col-sm-6 no-padding-right">
                            <div class="address1">639 Water Street East</div>
                            <div class="address2">Summerside C1N 4H9</div>
                            <div class="distance"><span class="text">Distance:</span> 18.5 miles
                            </div>
                          </div>
                          <div class="col-md-7 col-lg-6 col-sm-6 text-right buttons hidden-xs">
                            <div class="dropdown-block">
                              <button class="btn btn-five  " type="button"
                                      data-toggle="dropdown"><i
                                class="icon-search-results-icon3"></i></button>
                              <ul class="dropdown-menu">
                                <li><a class="tel" href="tel:(902) 436-7387">(902)
                                  436-7387</a></li>
                              </ul>
                            </div>
                            <a href="/practices/canada/prince-edward-island/summerside/gillis-veterinary-clinic-23800"
                               class="btn btn-more">MORE <i
                              class="icon-search-results-icon4 normal"></i><i
                              class="icon-next-arrow hover"></i></a></div>
                        </div>
                      </div>
                    </div>
                    <div class="row buttons-row visible-xs">
                      <div class="col-xs-6 col-img">
                        <div class="dropdown-block">
                          <button class="btn btn-five  " type="button" data-toggle="dropdown"><i
                            class="icon-search-results-icon3"></i></button>
                          <ul class="dropdown-menu">
                            <li><a href="tel:(902) 436-7387">(902) 436-7387</a></li>
                          </ul>
                        </div>
                      </div>
                      <div class="col-xs-6"><a
                        href="/practices/canada/prince-edward-island/summerside/gillis-veterinary-clinic-23800"
                        class="btn btn-more">MORE <i class="icon-search-results-icon4 normal"></i><i
                        class="icon-next-arrow hover"></i></a></div>
                    </div>
                  </div>
                </div>
                <div ng-scroll-to-it="scrollToIt"></div>
                <div class="search_results__show_more hide">
                  <button class="btn btn-five" ng-click="showMore()" data-loading-text="LOADING..."
                          ng-bs-loading="isButtonBusy">SHOW ME MORE
                  </button>
                </div>
              </div>
            </div>
            <div class="search_results__nearby_towns  "><span class="text">Nearby Locations:</span>&nbsp;<a
              href="/practices/canada/prince-edward-island/montague" class="town">Montague<span
              class="">,</span></a>&nbsp;<a href="/practices/canada/prince-edward-island/new-perth"
                                            class="town">New Perth<span class="">,</span></a>&nbsp;<a
              href="/practices/canada/prince-edward-island/stratford" class="town">Stratford<span
              class="">,</span></a>&nbsp;<a href="/practices/canada/prince-edward-island/cornwall"
                                            class="town">Cornwall<span class="">,</span></a>&nbsp;<a
              href="/practices/canada/prince-edward-island/charlottetown" class="town">Charlottetown<span
              class="">,</span></a>&nbsp;<a href="/practices/canada/prince-edward-island/mount-stewart"
                                            class="town">Mount Stewart<span class="">,</span></a>&nbsp;<a
              href="/practices/canada/prince-edward-island/summerside" class="town">Summerside<span
              class="">,</span></a>&nbsp;<a href="/practices/canada/prince-edward-island/kensington"
                                            class="town">Kensington<span class="">,</span></a>&nbsp;<a
              href="/practices/canada/prince-edward-island/o'leary" class="town">O'Leary<span
              class="hide">,</span></a>&nbsp;
            </div>
          </div>

        </div>
      </div>
    </div>
  </div>
</template>

<script>
    import {mapGetters} from "vuex";

    export default {
      layout: 'basic',

      created() {
        document.body.className += ' public-page-top';
      },

      beforeRouteLeave (to, from, next) {
        document.body.className = '';
        next();
      },

      metaInfo () {
        return { title: this.$t('home') }
      },

      data: () => ({
        title: window.config.appName,
        searchToggled: false,
      }),

      computed: mapGetters({
        authenticated: 'auth/check'
      })
    }
</script>

<style scoped>

</style>
