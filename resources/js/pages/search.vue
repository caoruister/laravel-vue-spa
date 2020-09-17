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
          <div class="col-md-5 special-col col-sm-12 ">
            <div class="row info-block">
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
              <div class="col-sm-9 col-xs-7 col-md-8 search_results__sort no-padding-left">
                <div class="btn-filter hidden-xs" ng-class="{'selected': isFiltered(1)}"
                     ng-click="filter(1)">Open<span class="hidden-md"> Now</span></div>
                <div class="btn-filter hidden-xs" ng-class="{'selected': isFiltered(2)}"
                     ng-click="filter(2)">24/7<span class="hidden-md"> Emergency</span></div>
                <div class="dropdown">
                  <button class="dropdown-toggle" type="button" data-toggle="dropdown"><span
                    class="sort-by-name">Recommended</span> <i class="icon-business-profile-iconj"></i>
                  </button>
                  <ul class="dropdown-menu">
                    <li class="sort-recommended">Recommended</li>
                    <li class="sort-rating">Rating</li>
                    <li class="sort-distance">Distance</li>
                  </ul>
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
          <div class="floating_map">
            <div ng-gmaps="" ng-gmaps-lat="53.482980" ng-gmaps-lon="-2.233275" ng-gmaps-zoom="11"
                 ng-gmaps-view="view" ng-gmaps-draggable="1" ng-gmaps-double-click="0"
                 ng-gmaps-cdn-url="https://topvet.azureedge.net" ng-gmaps-scroll-wheel="0"
                 ng-gmaps-hovered-on-map="hoveredOnMap" ng-gmaps-search-on-move="searchOnMove"
                 ng-gmaps-is-search-on-move="1" ng-gmaps-nocache="v=1.0.0.21455" ng-model="searchResults.items"
                 class="ng-pristine ng-untouched ng-valid ng-not-empty"
                 style="position: relative; overflow: hidden;">
              <div
                style="height: 100%; width: 100%; position: absolute; top: 0px; left: 0px; background-color: rgb(229, 227, 223);">
                <div class="gm-style"
                     style="position: absolute; z-index: 0; left: 0px; top: 0px; height: 100%; width: 100%; padding: 0px; border-width: 0px; margin: 0px;">
                  <div tabindex="0"
                       style="position: absolute; z-index: 0; left: 0px; top: 0px; height: 100%; width: 100%; padding: 0px; border-width: 0px; margin: 0px; cursor: url(&quot;https://maps.gstatic.com/mapfiles/openhand_8_8.cur&quot;), default; touch-action: pan-x pan-y;">
                    <div
                      style="z-index: 1; position: absolute; left: 50%; top: 50%; width: 100%; transform: translate(0px, 0px);">
                      <div
                        style="position: absolute; left: 0px; top: 0px; z-index: 100; width: 100%;">
                        <div style="position: absolute; left: 0px; top: 0px; z-index: 0;">
                          <div
                            style="position: absolute; z-index: 993; transform: matrix(1, 0, 0, 1, -114, -81);">
                            <div
                              style="position: absolute; left: 0px; top: 0px; width: 256px; height: 256px;">
                              <div style="width: 256px; height: 256px;"></div>
                            </div>
                            <div
                              style="position: absolute; left: -256px; top: 0px; width: 256px; height: 256px;">
                              <div style="width: 256px; height: 256px;"></div>
                            </div>
                            <div
                              style="position: absolute; left: -256px; top: -256px; width: 256px; height: 256px;">
                              <div style="width: 256px; height: 256px;"></div>
                            </div>
                            <div
                              style="position: absolute; left: 0px; top: -256px; width: 256px; height: 256px;">
                              <div style="width: 256px; height: 256px;"></div>
                            </div>
                            <div
                              style="position: absolute; left: 256px; top: -256px; width: 256px; height: 256px;">
                              <div style="width: 256px; height: 256px;"></div>
                            </div>
                            <div
                              style="position: absolute; left: 256px; top: 0px; width: 256px; height: 256px;">
                              <div style="width: 256px; height: 256px;"></div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div
                        style="position: absolute; left: 0px; top: 0px; z-index: 101; width: 100%;"></div>
                      <div
                        style="position: absolute; left: 0px; top: 0px; z-index: 102; width: 100%;"></div>
                      <div
                        style="position: absolute; left: 0px; top: 0px; z-index: 103; width: 100%;">
                        <div style="position: absolute; left: 0px; top: 0px; z-index: -1;">
                          <div
                            style="position: absolute; z-index: 993; transform: matrix(1, 0, 0, 1, -114, -81);">
                            <div
                              style="width: 256px; height: 256px; overflow: hidden; position: absolute; left: 0px; top: 0px;"></div>
                            <div
                              style="width: 256px; height: 256px; overflow: hidden; position: absolute; left: -256px; top: 0px;"></div>
                            <div
                              style="width: 256px; height: 256px; overflow: hidden; position: absolute; left: -256px; top: -256px;"></div>
                            <div
                              style="width: 256px; height: 256px; overflow: hidden; position: absolute; left: 0px; top: -256px;"></div>
                            <div
                              style="width: 256px; height: 256px; overflow: hidden; position: absolute; left: 256px; top: -256px;"></div>
                            <div
                              style="width: 256px; height: 256px; overflow: hidden; position: absolute; left: 256px; top: 0px;"></div>
                          </div>
                        </div>
                        <div
                          style="width: 40px; height: 44px; overflow: hidden; position: absolute; left: 7px; top: -20px; z-index: 24;">
                          <img alt=""
                               src="https://topvet.azureedge.net/Content/Icons1/pins.png?v=1.0.0.21455"
                               draggable="false"
                               style="position: absolute; left: 0px; top: -44px; user-select: none; width: 40px; height: 4400px; border: 0px; padding: 0px; margin: 0px; max-width: none;">
                        </div>
                        <div
                          style="width: 40px; height: 44px; overflow: hidden; position: absolute; left: 46px; top: -15px; z-index: 29;">
                          <img alt=""
                               src="https://topvet.azureedge.net/Content/Icons1/pins.png?v=1.0.0.21455"
                               draggable="false"
                               style="position: absolute; left: 0px; top: -88px; user-select: none; width: 40px; height: 4400px; border: 0px; padding: 0px; margin: 0px; max-width: none;">
                        </div>
                        <div
                          style="width: 40px; height: 44px; overflow: hidden; position: absolute; left: 10px; top: -17px; z-index: 27;">
                          <img alt=""
                               src="https://topvet.azureedge.net/Content/Icons1/pins.png?v=1.0.0.21455"
                               draggable="false"
                               style="position: absolute; left: 0px; top: -132px; user-select: none; width: 40px; height: 4400px; border: 0px; padding: 0px; margin: 0px; max-width: none;">
                        </div>
                        <div
                          style="width: 40px; height: 44px; overflow: hidden; position: absolute; left: 20px; top: -37px; z-index: 7;">
                          <img alt=""
                               src="https://topvet.azureedge.net/Content/Icons1/pins.png?v=1.0.0.21455"
                               draggable="false"
                               style="position: absolute; left: 0px; top: -176px; user-select: none; width: 40px; height: 4400px; border: 0px; padding: 0px; margin: 0px; max-width: none;">
                        </div>
                        <div
                          style="width: 40px; height: 44px; overflow: hidden; position: absolute; left: 45px; top: -8px; z-index: 36;">
                          <img alt=""
                               src="https://topvet.azureedge.net/Content/Icons1/pins.png?v=1.0.0.21455"
                               draggable="false"
                               style="position: absolute; left: 0px; top: -220px; user-select: none; width: 40px; height: 4400px; border: 0px; padding: 0px; margin: 0px; max-width: none;">
                        </div>
                        <div
                          style="width: 40px; height: 44px; overflow: hidden; position: absolute; left: 9px; top: -21px; z-index: 23;">
                          <img alt=""
                               src="https://topvet.azureedge.net/Content/Icons1/pins.png?v=1.0.0.21455"
                               draggable="false"
                               style="position: absolute; left: 0px; top: -264px; user-select: none; width: 40px; height: 4400px; border: 0px; padding: 0px; margin: 0px; max-width: none;">
                        </div>
                        <div
                          style="width: 40px; height: 44px; overflow: hidden; position: absolute; left: 2px; top: -27px; z-index: 17;">
                          <img alt=""
                               src="https://topvet.azureedge.net/Content/Icons1/pins.png?v=1.0.0.21455"
                               draggable="false"
                               style="position: absolute; left: 0px; top: -308px; user-select: none; width: 40px; height: 4400px; border: 0px; padding: 0px; margin: 0px; max-width: none;">
                        </div>
                        <div
                          style="width: 40px; height: 44px; overflow: hidden; position: absolute; left: -52px; top: -42px; z-index: 2;">
                          <img alt=""
                               src="https://topvet.azureedge.net/Content/Icons1/pins.png?v=1.0.0.21455"
                               draggable="false"
                               style="position: absolute; left: 0px; top: -352px; user-select: none; width: 40px; height: 4400px; border: 0px; padding: 0px; margin: 0px; max-width: none;">
                        </div>
                        <div
                          style="width: 40px; height: 44px; overflow: hidden; position: absolute; left: 0px; top: -18px; z-index: 26;">
                          <img alt=""
                               src="https://topvet.azureedge.net/Content/Icons1/pins.png?v=1.0.0.21455"
                               draggable="false"
                               style="position: absolute; left: 0px; top: -396px; user-select: none; width: 40px; height: 4400px; border: 0px; padding: 0px; margin: 0px; max-width: none;">
                        </div>
                        <div
                          style="width: 40px; height: 44px; overflow: hidden; position: absolute; left: 52px; top: -10px; z-index: 34;">
                          <img alt=""
                               src="https://topvet.azureedge.net/Content/Icons1/pins.png?v=1.0.0.21455"
                               draggable="false"
                               style="position: absolute; left: 0px; top: -440px; user-select: none; width: 40px; height: 4400px; border: 0px; padding: 0px; margin: 0px; max-width: none;">
                        </div>
                        <div
                          style="width: 40px; height: 44px; overflow: hidden; position: absolute; left: -38px; top: -45px; z-index: -1;">
                          <img alt=""
                               src="https://topvet.azureedge.net/Content/Icons1/pins.png?v=1.0.0.21455"
                               draggable="false"
                               style="position: absolute; left: 0px; top: -484px; user-select: none; width: 40px; height: 4400px; border: 0px; padding: 0px; margin: 0px; max-width: none;">
                        </div>
                        <div
                          style="width: 40px; height: 44px; overflow: hidden; position: absolute; left: 51px; top: -10px; z-index: 34;">
                          <img alt=""
                               src="https://topvet.azureedge.net/Content/Icons1/pins.png?v=1.0.0.21455"
                               draggable="false"
                               style="position: absolute; left: 0px; top: -528px; user-select: none; width: 40px; height: 4400px; border: 0px; padding: 0px; margin: 0px; max-width: none;">
                        </div>
                        <div
                          style="width: 40px; height: 44px; overflow: hidden; position: absolute; left: -92px; top: -80px; z-index: -36;">
                          <img alt=""
                               src="https://topvet.azureedge.net/Content/Icons1/pins.png?v=1.0.0.21455"
                               draggable="false"
                               style="position: absolute; left: 0px; top: -572px; user-select: none; width: 40px; height: 4400px; border: 0px; padding: 0px; margin: 0px; max-width: none;">
                        </div>
                        <div
                          style="width: 40px; height: 44px; overflow: hidden; position: absolute; left: -50px; top: -39px; z-index: 5;">
                          <img alt=""
                               src="https://topvet.azureedge.net/Content/Icons1/pins.png?v=1.0.0.21455"
                               draggable="false"
                               style="position: absolute; left: 0px; top: -616px; user-select: none; width: 40px; height: 4400px; border: 0px; padding: 0px; margin: 0px; max-width: none;">
                        </div>
                      </div>
                      <div style="position: absolute; left: 0px; top: 0px; z-index: 0;">
                        <div
                          style="position: absolute; z-index: 993; transform: matrix(1, 0, 0, 1, -114, -81);">
                          <div
                            style="position: absolute; left: 256px; top: -256px; width: 256px; height: 256px; transition: opacity 200ms linear 0s;">
                            <img draggable="false" alt="" role="presentation"
                                 src="https://maps.googleapis.com/maps/vt?pb=!1m5!1m4!1i7!2i42!3i44!4i256!2m3!1e0!2sm!3i524245108!3m12!2sen-GB!3sUS!5e18!12m4!1e68!2m2!1sset!2sRoadmap!12m3!1e37!2m1!1ssmartmaps!4e0!5m1!5f2&amp;key=AIzaSyDXf4lE7_8mbdsF2gKLOEmb7vyBy27rvkc&amp;token=74832"
                                 style="width: 256px; height: 256px; user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none;">
                          </div>
                          <div
                            style="position: absolute; left: 0px; top: -256px; width: 256px; height: 256px; transition: opacity 200ms linear 0s;">
                            <img draggable="false" alt="" role="presentation"
                                 src="https://maps.googleapis.com/maps/vt?pb=!1m5!1m4!1i7!2i41!3i44!4i256!2m3!1e0!2sm!3i524245108!3m12!2sen-GB!3sUS!5e18!12m4!1e68!2m2!1sset!2sRoadmap!12m3!1e37!2m1!1ssmartmaps!4e0!5m1!5f2&amp;key=AIzaSyDXf4lE7_8mbdsF2gKLOEmb7vyBy27rvkc&amp;token=20525"
                                 style="width: 256px; height: 256px; user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none;">
                          </div>
                          <div
                            style="position: absolute; left: 256px; top: 0px; width: 256px; height: 256px; transition: opacity 200ms linear 0s;">
                            <img draggable="false" alt="" role="presentation"
                                 src="https://maps.googleapis.com/maps/vt?pb=!1m5!1m4!1i7!2i42!3i45!4i256!2m3!1e0!2sm!3i524245108!3m12!2sen-GB!3sUS!5e18!12m4!1e68!2m2!1sset!2sRoadmap!12m3!1e37!2m1!1ssmartmaps!4e0!5m1!5f2&amp;key=AIzaSyDXf4lE7_8mbdsF2gKLOEmb7vyBy27rvkc&amp;token=106339"
                                 style="width: 256px; height: 256px; user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none;">
                          </div>
                          <div
                            style="position: absolute; left: -256px; top: -256px; width: 256px; height: 256px; transition: opacity 200ms linear 0s;">
                            <img draggable="false" alt="" role="presentation"
                                 src="https://maps.googleapis.com/maps/vt?pb=!1m5!1m4!1i7!2i40!3i44!4i256!2m3!1e0!2sm!3i524245672!3m12!2sen-GB!3sUS!5e18!12m4!1e68!2m2!1sset!2sRoadmap!12m3!1e37!2m1!1ssmartmaps!4e0!5m1!5f2&amp;key=AIzaSyDXf4lE7_8mbdsF2gKLOEmb7vyBy27rvkc&amp;token=7908"
                                 style="width: 256px; height: 256px; user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none;">
                          </div>
                          <div
                            style="position: absolute; left: -256px; top: 0px; width: 256px; height: 256px; transition: opacity 200ms linear 0s;">
                            <img draggable="false" alt="" role="presentation"
                                 src="https://maps.googleapis.com/maps/vt?pb=!1m5!1m4!1i7!2i40!3i45!4i256!2m3!1e0!2sm!3i524245672!3m12!2sen-GB!3sUS!5e18!12m4!1e68!2m2!1sset!2sRoadmap!12m3!1e37!2m1!1ssmartmaps!4e0!5m1!5f2&amp;key=AIzaSyDXf4lE7_8mbdsF2gKLOEmb7vyBy27rvkc&amp;token=39415"
                                 style="width: 256px; height: 256px; user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none;">
                          </div>
                          <div
                            style="position: absolute; left: 0px; top: 0px; width: 256px; height: 256px; transition: opacity 200ms linear 0s;">
                            <img draggable="false" alt="" role="presentation"
                                 src="https://maps.googleapis.com/maps/vt?pb=!1m5!1m4!1i7!2i41!3i45!4i256!2m3!1e0!2sm!3i524245108!3m12!2sen-GB!3sUS!5e18!12m4!1e68!2m2!1sset!2sRoadmap!12m3!1e37!2m1!1ssmartmaps!4e0!5m1!5f2&amp;key=AIzaSyDXf4lE7_8mbdsF2gKLOEmb7vyBy27rvkc&amp;token=52032"
                                 style="width: 256px; height: 256px; user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none;">
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="gm-style-pbc"
                         style="z-index: 2; position: absolute; height: 100%; width: 100%; padding: 0px; border-width: 0px; margin: 0px; left: 0px; top: 0px; opacity: 0;">
                      <p class="gm-style-pbt"></p></div>
                    <div
                      style="z-index: 3; position: absolute; height: 100%; width: 100%; padding: 0px; border-width: 0px; margin: 0px; left: 0px; top: 0px; touch-action: pan-x pan-y;">
                      <div
                        style="z-index: 4; position: absolute; left: 50%; top: 50%; width: 100%; transform: translate(0px, 0px);">
                        <div
                          style="position: absolute; left: 0px; top: 0px; z-index: 104; width: 100%;"></div>
                        <div
                          style="position: absolute; left: 0px; top: 0px; z-index: 105; width: 100%;"></div>
                        <div
                          style="position: absolute; left: 0px; top: 0px; z-index: 106; width: 100%;">
                          <div title=""
                               style="width: 56px; height: 60px; overflow: hidden; position: absolute; opacity: 0; cursor: pointer; touch-action: none; left: -1px; top: -28px; z-index: 24;">
                            <img alt=""
                                 src="https://topvet.azureedge.net/Content/Icons1/pins.png?v=1.0.0.21455"
                                 draggable="false"
                                 style="position: absolute; left: 0px; top: 0px; width: 56px; height: 60px; user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none;">
                          </div>
                          <div title=""
                               style="width: 56px; height: 60px; overflow: hidden; position: absolute; opacity: 0; cursor: pointer; touch-action: none; left: 38px; top: -23px; z-index: 29;">
                            <img alt=""
                                 src="https://topvet.azureedge.net/Content/Icons1/pins.png?v=1.0.0.21455"
                                 draggable="false"
                                 style="position: absolute; left: 0px; top: 0px; width: 56px; height: 60px; user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none;">
                          </div>
                          <div title=""
                               style="width: 56px; height: 60px; overflow: hidden; position: absolute; opacity: 0; cursor: pointer; touch-action: none; left: 2px; top: -25px; z-index: 27;">
                            <img alt=""
                                 src="https://topvet.azureedge.net/Content/Icons1/pins.png?v=1.0.0.21455"
                                 draggable="false"
                                 style="position: absolute; left: 0px; top: 0px; width: 56px; height: 60px; user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none;">
                          </div>
                          <div title=""
                               style="width: 56px; height: 60px; overflow: hidden; position: absolute; opacity: 0; cursor: pointer; touch-action: none; left: 12px; top: -45px; z-index: 7;">
                            <img alt=""
                                 src="https://topvet.azureedge.net/Content/Icons1/pins.png?v=1.0.0.21455"
                                 draggable="false"
                                 style="position: absolute; left: 0px; top: 0px; width: 56px; height: 60px; user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none;">
                          </div>
                          <div title=""
                               style="width: 56px; height: 60px; overflow: hidden; position: absolute; opacity: 0; cursor: pointer; touch-action: none; left: 37px; top: -16px; z-index: 36;">
                            <img alt=""
                                 src="https://topvet.azureedge.net/Content/Icons1/pins.png?v=1.0.0.21455"
                                 draggable="false"
                                 style="position: absolute; left: 0px; top: 0px; width: 56px; height: 60px; user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none;">
                          </div>
                          <div title=""
                               style="width: 56px; height: 60px; overflow: hidden; position: absolute; opacity: 0; cursor: pointer; touch-action: none; left: 1px; top: -29px; z-index: 23;">
                            <img alt=""
                                 src="https://topvet.azureedge.net/Content/Icons1/pins.png?v=1.0.0.21455"
                                 draggable="false"
                                 style="position: absolute; left: 0px; top: 0px; width: 56px; height: 60px; user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none;">
                          </div>
                          <div title=""
                               style="width: 56px; height: 60px; overflow: hidden; position: absolute; opacity: 0; cursor: pointer; touch-action: none; left: -6px; top: -35px; z-index: 17;">
                            <img alt=""
                                 src="https://topvet.azureedge.net/Content/Icons1/pins.png?v=1.0.0.21455"
                                 draggable="false"
                                 style="position: absolute; left: 0px; top: 0px; width: 56px; height: 60px; user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none;">
                          </div>
                          <div title=""
                               style="width: 56px; height: 60px; overflow: hidden; position: absolute; opacity: 0; cursor: pointer; touch-action: none; left: -60px; top: -50px; z-index: 2;">
                            <img alt=""
                                 src="https://topvet.azureedge.net/Content/Icons1/pins.png?v=1.0.0.21455"
                                 draggable="false"
                                 style="position: absolute; left: 0px; top: 0px; width: 56px; height: 60px; user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none;">
                          </div>
                          <div title=""
                               style="width: 56px; height: 60px; overflow: hidden; position: absolute; opacity: 0; cursor: pointer; touch-action: none; left: -8px; top: -26px; z-index: 26;">
                            <img alt=""
                                 src="https://topvet.azureedge.net/Content/Icons1/pins.png?v=1.0.0.21455"
                                 draggable="false"
                                 style="position: absolute; left: 0px; top: 0px; width: 56px; height: 60px; user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none;">
                          </div>
                          <div title=""
                               style="width: 56px; height: 60px; overflow: hidden; position: absolute; opacity: 0; cursor: pointer; touch-action: none; left: 44px; top: -18px; z-index: 34;">
                            <img alt=""
                                 src="https://topvet.azureedge.net/Content/Icons1/pins.png?v=1.0.0.21455"
                                 draggable="false"
                                 style="position: absolute; left: 0px; top: 0px; width: 56px; height: 60px; user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none;">
                          </div>
                          <div title=""
                               style="width: 56px; height: 60px; overflow: hidden; position: absolute; opacity: 0; cursor: pointer; touch-action: none; left: -46px; top: -53px; z-index: -1;">
                            <img alt=""
                                 src="https://topvet.azureedge.net/Content/Icons1/pins.png?v=1.0.0.21455"
                                 draggable="false"
                                 style="position: absolute; left: 0px; top: 0px; width: 56px; height: 60px; user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none;">
                          </div>
                          <div title=""
                               style="width: 56px; height: 60px; overflow: hidden; position: absolute; opacity: 0; cursor: pointer; touch-action: none; left: 43px; top: -18px; z-index: 34;">
                            <img alt=""
                                 src="https://topvet.azureedge.net/Content/Icons1/pins.png?v=1.0.0.21455"
                                 draggable="false"
                                 style="position: absolute; left: 0px; top: 0px; width: 56px; height: 60px; user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none;">
                          </div>
                          <div title=""
                               style="width: 56px; height: 60px; overflow: hidden; position: absolute; opacity: 0; cursor: pointer; touch-action: none; left: -100px; top: -88px; z-index: -36;">
                            <img alt=""
                                 src="https://topvet.azureedge.net/Content/Icons1/pins.png?v=1.0.0.21455"
                                 draggable="false"
                                 style="position: absolute; left: 0px; top: 0px; width: 56px; height: 60px; user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none;">
                          </div>
                          <div title=""
                               style="width: 56px; height: 60px; overflow: hidden; position: absolute; opacity: 0; cursor: pointer; touch-action: none; left: -58px; top: -47px; z-index: 5;">
                            <img alt=""
                                 src="https://topvet.azureedge.net/Content/Icons1/pins.png?v=1.0.0.21455"
                                 draggable="false"
                                 style="position: absolute; left: 0px; top: 0px; width: 56px; height: 60px; user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none;">
                          </div>
                        </div>
                        <div
                          style="position: absolute; left: 0px; top: 0px; z-index: 107; width: 100%;"></div>
                      </div>
                    </div>
                  </div>
                  <iframe aria-hidden="true" frameborder="0" tabindex="-1"
                          style="z-index: -1; position: absolute; width: 100%; height: 100%; top: 0px; left: 0px; border: none;"></iframe>
                  <div
                    style="margin-left: 5px; margin-right: 5px; z-index: 1000000; position: absolute; left: 0px; bottom: 0px;">
                    <a target="_blank" rel="noopener"
                       href="https://maps.google.com/maps?ll=46.431417,-63.439518&amp;z=7&amp;t=m&amp;hl=en-GB&amp;gl=US&amp;mapclient=apiv3"
                       title="Open this area in Google Maps (opens a new window)"
                       style="position: static; overflow: visible; float: none; display: inline;">
                      <div style="width: 66px; height: 26px; cursor: pointer;"><img alt=""
                                                                                    src="https://maps.gstatic.com/mapfiles/api-3/images/google4_hdpi.png"
                                                                                    draggable="false"
                                                                                    style="position: absolute; left: 0px; top: 0px; width: 66px; height: 26px; user-select: none; border: 0px; padding: 0px; margin: 0px;">
                      </div>
                    </a></div>
                  <div
                    style="background-color: white; padding: 15px 21px; border: 1px solid rgb(171, 171, 171); font-family: Roboto, Arial, sans-serif; color: rgb(34, 34, 34); box-sizing: border-box; box-shadow: rgba(0, 0, 0, 0.2) 0px 4px 16px; z-index: 10000002; display: none; width: 300px; height: 180px; position: absolute; left: 202px; top: 14px;">
                    <div style="padding: 0px 0px 10px; font-size: 16px; box-sizing: border-box;">Map
                      Data
                    </div>
                    <div style="font-size: 13px;">Map data ©2020 Google</div>
                    <button draggable="false" title="Close" aria-label="Close" type="button"
                            class="gm-ui-hover-effect"
                            style="background: none; display: block; border: 0px; margin: 0px; padding: 0px; position: absolute; cursor: pointer; user-select: none; top: 0px; right: 0px; width: 37px; height: 37px;">
                      <img
                        src="data:image/svg+xml,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%2224px%22%20height%3D%2224px%22%20viewBox%3D%220%200%2024%2024%22%20fill%3D%22%23000000%22%3E%0A%20%20%20%20%3Cpath%20d%3D%22M19%206.41L17.59%205%2012%2010.59%206.41%205%205%206.41%2010.59%2012%205%2017.59%206.41%2019%2012%2013.41%2017.59%2019%2019%2017.59%2013.41%2012z%22%2F%3E%0A%20%20%20%20%3Cpath%20d%3D%22M0%200h24v24H0z%22%20fill%3D%22none%22%2F%3E%0A%3C%2Fsvg%3E%0A"
                        style="pointer-events: none; display: block; width: 13px; height: 13px; margin: 12px;">
                    </button>
                  </div>
                  <div class="gmnoprint"
                       style="z-index: 1000001; position: absolute; right: 0px; bottom: 0px; width: 12px;">
                    <div draggable="false" class="gm-style-cc"
                         style="user-select: none; height: 14px; line-height: 14px;">
                      <div style="opacity: 0.7; width: 100%; height: 100%; position: absolute;">
                        <div style="width: 1px;"></div>
                        <div
                          style="background-color: rgb(245, 245, 245); width: auto; height: 100%; margin-left: 1px;"></div>
                      </div>
                      <div
                        style="position: relative; padding-right: 6px; padding-left: 6px; box-sizing: border-box; font-family: Roboto, Arial, sans-serif; font-size: 10px; color: rgb(68, 68, 68); white-space: nowrap; direction: ltr; text-align: right; vertical-align: middle; display: inline-block;">
                        <a style="text-decoration: none; cursor: pointer; display: none;">Map
                          Data</a><span>Map data ©2020 Google</span></div>
                    </div>
                  </div>
                  <div class="gmnoscreen" style="position: absolute; right: 0px; bottom: 0px;">
                    <div
                      style="font-family: Roboto, Arial, sans-serif; font-size: 11px; color: rgb(68, 68, 68); direction: ltr; text-align: right; background-color: rgb(245, 245, 245);">
                      Map data ©2020 Google
                    </div>
                  </div>
                  <div class="gmnoprint gm-style-cc" draggable="false"
                       style="z-index: 1000001; user-select: none; height: 14px; line-height: 14px; position: absolute; right: 0px; bottom: 0px;">
                    <div style="opacity: 0.7; width: 100%; height: 100%; position: absolute;">
                      <div style="width: 1px;"></div>
                      <div
                        style="background-color: rgb(245, 245, 245); width: auto; height: 100%; margin-left: 1px;"></div>
                    </div>
                    <div
                      style="position: relative; padding-right: 6px; padding-left: 6px; box-sizing: border-box; font-family: Roboto, Arial, sans-serif; font-size: 10px; color: rgb(68, 68, 68); white-space: nowrap; direction: ltr; text-align: right; vertical-align: middle; display: inline-block;">
                      <a href="https://www.google.com/intl/en-GB_US/help/terms_maps.html"
                         target="_blank" rel="noopener"
                         style="text-decoration: none; cursor: pointer; color: rgb(68, 68, 68);">Terms
                        of Use</a></div>
                  </div>
                  <button draggable="false" title="Toggle fullscreen view"
                          aria-label="Toggle fullscreen view" type="button"
                          class="gm-control-active gm-fullscreen-control"
                          style="background: none rgb(255, 255, 255); border: 0px; margin: 10px; padding: 0px; position: absolute; cursor: pointer; user-select: none; border-radius: 2px; height: 40px; width: 40px; box-shadow: rgba(0, 0, 0, 0.3) 0px 1px 4px -1px; overflow: hidden; display: none; top: 0px; right: 0px;">
                    <img
                      src="data:image/svg+xml,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%2218%22%20height%3D%2218%22%20viewBox%3D%220%20018%2018%22%3E%0A%20%20%3Cpath%20fill%3D%22%23666%22%20d%3D%22M0%2C0v2v4h2V2h4V0H2H0z%20M16%2C0h-4v2h4v4h2V2V0H16z%20M16%2C16h-4v2h4h2v-2v-4h-2V16z%20M2%2C12H0v4v2h2h4v-2H2V12z%22%2F%3E%0A%3C%2Fsvg%3E%0A"
                      style="height: 18px; width: 18px;"><img
                    src="data:image/svg+xml,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%2218%22%20height%3D%2218%22%20viewBox%3D%220%200%2018%2018%22%3E%0A%20%20%3Cpath%20fill%3D%22%23333%22%20d%3D%22M0%2C0v2v4h2V2h4V0H2H0z%20M16%2C0h-4v2h4v4h2V2V0H16z%20M16%2C16h-4v2h4h2v-2v-4h-2V16z%20M2%2C12H0v4v2h2h4v-2H2V12z%22%2F%3E%0A%3C%2Fsvg%3E%0A"
                    style="height: 18px; width: 18px;"><img
                    src="data:image/svg+xml,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%2218%22%20height%3D%2218%22%20viewBox%3D%220%200%2018%2018%22%3E%0A%20%20%3Cpath%20fill%3D%22%23111%22%20d%3D%22M0%2C0v2v4h2V2h4V0H2H0z%20M16%2C0h-4v2h4v4h2V2V0H16z%20M16%2C16h-4v2h4h2v-2v-4h-2V16z%20M2%2C12H0v4v2h2h4v-2H2V12z%22%2F%3E%0A%3C%2Fsvg%3E%0A"
                    style="height: 18px; width: 18px;"></button>
                  <div style="z-index: 0; position: absolute; top: 0px; left: 0px;">
                    <div class="search-move"><label><span class="custom-checkbox"><input type="checkbox"
                                                                                         ng-bs-checkbox=""></span></label><span
                      class="text">Search as I move the map</span></div>
                  </div>
                  <div style="z-index: 0; position: absolute; bottom: 0px; right: 0px;">
                    <div style="margin: 18px;">
                      <div class="zoom-control"><i class="icon-plus"></i></div>
                      <div class="zoom-control minus"><i class="icon-minus"></i></div>
                    </div>
                  </div>
                </div>
              </div>
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
