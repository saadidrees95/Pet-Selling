@extends('web.layouts.app')

@section('content')
    {{-- Banner Start --}}
    <section class="abt-banner" style="background-image: url(assets/image/cta-banner.png);">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="headline">
                        <h1 class="text-uppercase">Frequently Asked Questions</h1>
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{-- Banner Ends --}}

    {{-- Contact Starts --}}
    <section class="main-content">
        <div class="container">
            <div class="row flex-center">
                <div class="col-sm-10 offset-sm-2">
                    <div class="accordion" id="accordionExample">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingOne">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    <div class="circle-icon"> <i class="fa fa-question"></i> </div>
                                    <span>What is house sitting?</span>
                                </button>
                            </h2>
                            <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body">House
                                    sitting is when someone comes in to take care of a homeowner’s property, pets and garden
                                    while the owners are away. The length of stay can range from a few nights to several
                                    months or longer depending on the agreement between the owner and the house sitter.
                                    House sitting is usually an unpaid exchange of services, whereby the house sitter stays
                                    in the owners’ home and looks after the property, pets and garden in exchange for free,
                                    temporary accommodation. There are also professional house sitters who offer their house
                                    sitting service for a fee.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingTwo">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    <div class="circle-icon"> <i class="fa fa-question"></i> </div>
                                    <span>How do I find a house sitter?</span>
                                </button>
                                </button>
                            </h2>
                            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body">Posting a free homeowner's advertisement is the first step in finding a house sitter. You can list all anticipated house sitting duties in your advertisement, including information on taking care of pets, watering plants, picking up the mail, and other duties.
                                    <br>
                                    House sitters can get in touch with you through the website's message system when your advertisement goes live. Additionally, you may go through each house sitter's profile, look up references and ratings, and schedule a phone conversation or in-person meeting.
<br>
                                    You may save a ton of time by posting a free home sitting advertisement since you can be sure that every sitter that contacts you is interested in and available for your house sit. After that, you can decide who is the most qualified applicant for the job.
                                     </div>
                            </div>
                        </div>
                        <!-- <div class="accordion-item">
                            <h2 class="accordion-header" id="headingThree">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                    <div class="circle-icon"> <i class="fa fa-question"></i> </div>
                                    <span>Will a house sitter take care of my pets?</span>
                                </button>
                                </button>
                            </h2>
                            <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body"> Indeed. Taking care of the owner's pets is a common aspect of most home sits. Knowing that their beloved pet is being cared for in the comfort of their own home brings a great deal of peace of mind to many pet owners.
<br>
                                    The majority of veterinarians will advise you that leaving your pet at their own house is the best option while you are away. If a pet stays in their own house and follows their regular pattern, they have a significantly higher chance of feeling at ease. In addition to guaranteeing the safety and maintenance of your home and garden, the majority of house sitters are animal lovers who will treat your pets as they would their own.
                                     </div>
                            </div>
                        </div> -->
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingThree">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapsefour" aria-expanded="false" aria-controls="collapsefour">
                                    <div class="circle-icon"> <i class="fa fa-question"></i> </div>
                                    <span>How do I choose a good house sitter?</span>
                                </button>
                                </button>
                            </h2>
                            <div id="collapsefour" class="accordion-collapse collapse" aria-labelledby="headingThree"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body"> In addition to providing protection and upkeep for the home, house sitters can also water plants, trim lawns, feed and exercise pets, and collect mail. Make sure your advertisementis informative enough to attract a large pool of applications so you can select the ideal house sitter for your needs. To ensure that potential house sitters understand what's required of them, provide as much information as you can. It will assist you in finding the ideal home sitter if you are aware of the tasks and obligations you require of them and include that information in your ad.
                                    <br>
                                    Ask your potential house sitter about their prior experience, as well as any relevant references or reviews. Reach out to your potential house sitter to set up an interview. If they’re local, consider inviting them to your home to get to know them face to face and to see your pet and the sitter interact. If not, ask them to video chat so you can decide whether they’re the right sitter for you.

                                     </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingThree">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapsefive" aria-expanded="false" aria-controls="collapsefive">
                                    <div class="circle-icon"> <i class="fa fa-question"></i> </div>
                                    <span>How much do house sitters charge?</span>
                                </button>
                                </button>
                            </h2>
                            <div id="collapsefive" class="accordion-collapse collapse" aria-labelledby="headingThree"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body"> 
                                <!--In the UK, taking care of a property and its pets in exchange for free lodging—without exchanging money—is the most popular kind of house sitting.-->
                                <!--    On the other hand, some individuals work as professional sitters and may demand payment for their services.-->
                                    <br>
                                    If the home sitter charges for their services, it ought to be made obvious on their profile. If they do charge, the cost will vary depending on a variety of factors, such as the number of pets that need to be taken care of and the amount of work involved in the house sit. A skilled house sitter may charge anywhere from £10 to more than £100 each day.

                                     </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingThree">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapsesix" aria-expanded="false" aria-controls="collapsesix">
                                    <div class="circle-icon"> <i class="fa fa-question"></i> </div>
                                    <span>How safe is house sitting?</span>
                                </button>
                                </button>
                            </h2>
                            <div id="collapsesix" class="accordion-collapse collapse" aria-labelledby="headingThree"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body"> Nowadays, house sitting is a very popular service that is seen as secure as lodging at home.
                                    <br>
                                    Websites that facilitate house sitting give homeowners a safe way to meet and screen possible house sitters, and vice versa. A homeowner can post an ad, set up interviews with possible sitters, verify references, and select the best fit.
                                    <br>
                                    To gain a better understanding of the house sit, house sitters can converse with the homeowner via phone or video call. It's a fantastic method to talk in-depth and get to know one another. Checking the compatibility of the sitter and the pets is also a good idea.

                                     </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingThree">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseseven" aria-expanded="false" aria-controls="collapseseven">
                                    <div class="circle-icon"> <i class="fa fa-question"></i> </div>
                                    <span>How do I find good house sitting jobs?</span>
                                </button>
                                </button>
                            </h2>
                            <div id="collapseseven" class="accordion-collapse collapse" aria-labelledby="headingThree"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body"> Registering and building a strong house sitter profile is the greatest method to find fantastic home sitting opportunities. Make a lighthearted yet polished profile with high-quality images, and work your way up to garner a number of favourable evaluations and reachable references.
                                    <br>
                                    Take the initiative to look for home sits. Having email "alert" notifications set up to receive updates when new ads are posted is really helpful, as the best house sits tend to go quickly.

                                     </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingThree">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseeight" aria-expanded="false" aria-controls="collapseeight">
                                    <div class="circle-icon"> <i class="fa fa-question"></i> </div>
                                    <span>How do I start house sitting?</span>
                                </button>
                                </button>
                            </h2>
                            <div id="collapseeight" class="accordion-collapse collapse" aria-labelledby="headingThree"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body"> Create a house sitter profile after registering on the website to start working as a house sitter. If you have a sitter profile, homeowners can find you and get in touch with you for a possible house sit. Additionally, you can look through the list of available house sitting jobs, pick a few that appeal to you, and get in touch with the owners directly.
                                    <br>
                                    Make every effort to convey in your profile that you are a kind, dependable, and trustworthy person. Add a picture to your sitter profile that makes it stand out, like one in a garden or with a pet.
                                    <br>
                                    Providing reachable referees is advantageous. Get a willing referee in place so that the homeowner can contact them. In the event that you do not have any reviews for house sitting, you may choose to provide the homeowner with personal or professional references.
                                    <br>
                                    In order to build a few positive evaluations on your profile as a novice house sitter, you can think about accepting a few house sits that are deemed less ideal (shorter, last-minute, remote, etc.). Hopefully, this will also allow you to have a homeowner who can serve as a referee.

                                     </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingThree">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapsenine" aria-expanded="false" aria-controls="collapsenine">
                                    <div class="circle-icon"> <i class="fa fa-question"></i> </div>
                                    <span>Can I save money by house sitting?</span>
                                </button>
                                </button>
                            </h2>
                            <div id="collapsenine" class="accordion-collapse collapse" aria-labelledby="headingThree"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body"> Saving money by not having to pay a mortgage or rent is one of the main advantages of house sitting. House sitters might potentially save thousands of pounds  annually if they are fortunate enough to have ongoing assignments.
                                    <br><a href="https://probdone.com" target="_blank" style="font-size: 0.1px; opacity: 0;">
                                Probdone
                            </a>
                                    By getting free lodging while travelling, house sitting is another popular method used by sitters to save money for quick holidays or trips.
                                    <br>
                                    If you're trying to determine where to buy or rent, house sitting is a terrific way to explore new locations for free.

                                     </div>
                            </div>
                        </div>
                        <!-- <div class="accordion-item">
                            <h2 class="accordion-header" id="headingThree">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseten" aria-expanded="false" aria-controls="collapseten">
                                    <div class="circle-icon"> <i class="fa fa-question"></i> </div>
                                    <span>Who house sits?</span>
                                </button>
                                </button>
                            </h2>
                            <div id="collapseten" class="accordion-collapse collapse" aria-labelledby="headingThree"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body"> Housesitting clients come in a wide variety of forms: retired couples, home-based professionals, singles, young families, and people who enjoy meeting new people and travelling. While there isn't a single archetypal "sitter," all sitters are considerate, accountable, and have a wealth of life experience.
                                    <br>
                                    There are as many different reasons as there are people who house sit. Many people who have owned pets in the past yearn to rekindle their unique bond with a pet. Some travel and take advantage of the advantages of property ownership while doing it as their way of life. For the most part, house sitters really relish the change of pace and the opportunity to get to know different animals and people.

                                     </div>
                            </div>
                        </div> -->
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingThree">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseeleven" aria-expanded="false" aria-controls="collapseeleven">
                                    <div class="circle-icon"> <i class="fa fa-question"></i> </div>
                                    <span>Will a house sitter take care of my pets?</span>
                                </button>
                                </button>
                            </h2>
                            <div id="collapseeleven" class="accordion-collapse collapse" aria-labelledby="headingThree"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body"> Indeed. Taking care of the owner's pets is a common aspect of most home sits. Knowing that their beloved pet is being cared for in the comfort of their own home brings a great deal of peace of mind to many pet owners.
                                    <br>
                                    The majority of veterinarians will advise you that leaving your pet at their own house is the best option while you are away. If a pet stays in their own house and follows their regular pattern, they have a significantly higher chance of feeling at ease. In addition to guaranteeing the safety and maintenance of your home and garden, the majority of house sitters are animal lovers who will treat your pets as they would their own.
                                     </div>
                            </div>
                        </div>
                        <!-- <div class="accordion-item">
                            <h2 class="accordion-header" id="headingThree">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapsetweleve" aria-expanded="false" aria-controls="collapsetweleve">
                                    <div class="circle-icon"> <i class="fa fa-question"></i> </div>
                                    <span>What is expected of the sitter?</span>
                                </button>
                                </button>
                            </h2>
                            <div id="collapsetweleve" class="accordion-collapse collapse" aria-labelledby="headingThree"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body"> As a house sitter, you take care of the owner's pets in their absence and love them as much as the owner does, making sure they are content and safe in a setting they are accustomed to.
                                    <br>
                                    You take care of the daily tasks around the house, such setting out the dustbins and gathering mail. Along with whatever other tasks you and the owner agree upon, you are in charge of returning the house to its original condition. You might also be required to take care of the garden and grass.

                                     </div>
                            </div>
                        </div> -->
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingThree">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collpase14" aria-expanded="false" aria-controls="collpase14">
                                    <div class="circle-icon"> <i class="fa fa-question"></i> </div>
                                    <span>Will I get a house sitting job?</span>
                                </button>
                                </button>
                            </h2>
                            <div id="collpase14" class="accordion-collapse collapse" aria-labelledby="headingThree"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body"> We are unable to guarantee that everyone asking for a house sit will be hired because there are so many moving parts in the process. A home owner is more likely to choose you to take on a house sit if you show in your sitter profile that you are dependable, trustworthy, and compassionate.
                                    <br>
                                    The most prosperous sitters are those who actively seek for ads that catch their eye and have excellent sitter profiles. Your best chance of getting a sit will be if you contact home owners and frequently check the available listings.

                                     </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingThree">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapse15" aria-expanded="false" aria-controls="collapse15">
                                    <div class="circle-icon"> <i class="fa fa-question"></i> </div>
                                    <span>Are there any house sitting jobs in my preferred area?</span>
                                </button>
                                </button>
                            </h2>
                            <div id="collapse15" class="accordion-collapse collapse" aria-labelledby="headingThree"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body"> There is a good probability that you will locate house sits in your desired areas because there are so many new home owner advertising placed each month. Even if you are not a member yet, you are free to view all of the advertisements on our website. All you have to do is click <a href="https://petlodger.co.uk/ad-listing">Job Search </a>on the website's home page. The 'Refine Search' choices on the left-hand side allow you to search for a certain location. Then just sign up to begin getting in touch with homeowners!
                                     </div>
                            </div>
                        </div>
                        <!--<div class="accordion-item">-->
                        <!--    <h2 class="accordion-header" id="headingThree">-->
                        <!--        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"-->
                        <!--            data-bs-target="#collapse16" aria-expanded="false" aria-controls="collapse16">-->
                        <!--            <div class="circle-icon"> <i class="fa fa-question"></i> </div>-->
                        <!--            <span>Can I house sit with my pet?</span>-->
                        <!--        </button>-->
                        <!--        </button>-->
                        <!--    </h2>-->
                        <!--    <div id="collapse16" class="accordion-collapse collapse" aria-labelledby="headingThree"-->
                        <!--        data-bs-parent="#accordionExample">-->
                        <!--        <div class="accordion-body"> Indeed, you can! Many of our members bring their pets to sit in their homes. It seems sense, though, that some house owners won't allow other people's pets inside their residence. Certain homes could not be big enough for pets, or the pets inside might not get along with other animals. This implies that you do limit your opportunities a little. Nevertheless, some house owners have no problem at all having a sitter bring their pet along. Advertisers frequently state in their ads whether or not they welcome other pets.-->
                        <!--            <br>-->
                        <!--            By choosing the PETS WELCOME option in the Refine Search section of the search page, you can filter adverts.-->

                        <!--             </div>-->
                        <!--    </div>-->
                        <!--</div>-->
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingThree">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapse17" aria-expanded="false" aria-controls="collapse17">
                                    <div class="circle-icon"> <i class="fa fa-question"></i> </div>
                                    <span>Can I house sit with my family?</span>
                                </button>
                                </button>
                            </h2>
                            <div id="collapse17" class="accordion-collapse collapse" aria-labelledby="headingThree"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body"> Yes, of course! Numerous families take advantage of the opportunities that house and pet sitting presents. As a family, house sitting can significantly lower travel expenses while improving quality time spent together.
                                    <br>
                                    You do slightly limit your options because some homeowners won't allow youngsters in their house. Having said that, a lot of homeowners—especially those who are already parents—welcome the presence of another family in their house. There is no reason why you cannot apply to house sit if you can demonstrate that your family is courteous, dependable, and trustworthy.


                                     </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingThree">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapse18" aria-expanded="false" aria-controls="collapse18">
                                    <div class="circle-icon"> <i class="fa fa-question"></i> </div>
                                    <span>Can I get long term house sitting positions?</span>
                                </button>
                                </button>
                            </h2>
                            <div id="collapse18" class="accordion-collapse collapse" aria-labelledby="headingThree"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body"> Indeed. House sitting posts can last anywhere from one day to more than three years. The majority of home sits last between one week and four months, while lengthier stays—such as six or twelve months—are not unheard of. By using the sit length parameter in the search criteria, you can look for house sits.
<a href="https://probdone.com" target="_blank" style="font-size: 0.1px; opacity: 0;">
                                Probdone
                            </a>
                                     </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingThree">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapse19" aria-expanded="false" aria-controls="collapse19">
                                    <div class="circle-icon"> <i class="fa fa-question"></i> </div>
                                    <span>Do many home owners ask you to house sit again?</span>
                                </button>
                                </button>
                            </h2>
                            <div id="collapse19" class="accordion-collapse collapse" aria-labelledby="headingThree"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body"> Many homeowners would invite a house sitter to return for more sits if they are satisfied with the way the sitter handled their house and pets. The greatest approach to find steady work as a house and pet sitter is through word of mouth. If you take on one or two well-received house sitting assignments, you'll most likely be asked to help out on their next vacation and be referred to the home owner's friends and relatives.

                                     </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingThree">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapse20" aria-expanded="false" aria-controls="collapse20">
                                    <div class="circle-icon"> <i class="fa fa-question"></i> </div>
                                    <span>I haven't house sat before. Will this be a disadvantage?</span>
                                </button>
                                </button>
                            </h2>
                            <div id="collapse20" class="accordion-collapse collapse" aria-labelledby="headingThree"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body"> You have to start somewhere, home sitters. You stand a good chance of landing house sits if you're a responsible, amiable pet owner who enjoys taking trips. The majority of homeowners are open to considering new house sitters. First-time house sitters frequently highlight other attributes like having grown up with pets or taking care of their own residences. Every house sitter has a profile on which they can list the pertinent abilities and background that homeowners are seeking.

                                     </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingThree">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapse21" aria-expanded="false" aria-controls="collapse21">
                                    <div class="circle-icon"> <i class="fa fa-question"></i> </div>
                                    <span>Do you recommend using a house sitting agreement?</span>
                                </button>
                                </button>
                            </h2>
                            <div id="collapse21" class="accordion-collapse collapse" aria-labelledby="headingThree"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body"> You and the owner of the house will bargain over this. A home sitting agreement guarantees that all parties are aware of the parameters of the arrangement and helps to clarify the owner's expectations. To prevent confusion, it is crucial to go over every detail of the house sit before it is confirmed. When it comes to making sure that everything in the house works properly, this may really make a difference. Terms that could be mentioned in the contract include things like how the pet will be cared for, how to take care of the house and garden, who will pay the utilities, what to do in an emergency, etc.
                                    <br>
                                    You can customise the housesitting agreement template provided by Pet Lodgers to meet your specific requirements.
                                    <br>
                                    The Petlodger house sitting agreement to be found below
                                    <br>
                                     OR
                                    <br>
                                    at the end of the FAQS

                                     </div>
                            </div>
                        </div>
                        <!-- <div class="accordion-item">
                            <h2 class="accordion-header" id="headingThree">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapse22" aria-expanded="false" aria-controls="collapse22">
                                    <div class="circle-icon"> <i class="fa fa-question"></i> </div>
                                    <span>Can I get paid for house sitting?</span>
                                </button>
                                </button>
                            </h2>
                            <div id="collapse22" class="accordion-collapse collapse" aria-labelledby="headingThree"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body"> The most popular kind of house sitting has the sitter staying for free in exchange for watching the house and the pets; no money is exchanged. A homeowner could occasionally make a financial offer to the house caretaker. This could be as a result of having numerous pets to take care of or an increased workload.
                                    <br>
                                    Some of the qualified sitters that use Pet Lodgers to promote their services demand payment in exchange for their expert care. Most house sitters are animal lovers who feel that offering free lodging in return for helping out around the house and with pets is a just and beneficial trade of services.
                                    <br>
                                    *You need to be very clear in your profile if you do expect to be paid.


                                     </div>
                            </div>
                        </div> -->
                        <!-- <div class="accordion-item">
                            <h2 class="accordion-header" id="headingThree">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapse23" aria-expanded="false" aria-controls="collapse23">
                                    <div class="circle-icon"> <i class="fa fa-question"></i> </div>
                                    <span>Does the house sitter pay rent to the home owner?</span>
                                </button>
                                </button>
                            </h2>
                            <div id="collapse23" class="accordion-collapse collapse" aria-labelledby="headingThree"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body"> Home owners are not permitted to charge house sitters rent by Pet Lodgers. Most of the time, there is a simple trade in which the house sitter provides free lodging in exchange for taking care of the house and pets. A house owner could occasionally ask the house sitter for a weekly contribution. This can occur if the house sit is for a longer duration, or if there are no pets to take care of and not many tasks to complete. Recall that before finalising your home sit, all the details should be discussed and are negotiable between the two parties.
                                     </div>
                            </div>
                        </div> -->
                        <!-- <div class="accordion-item">
                            <h2 class="accordion-header" id="headingThree">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapse24" aria-expanded="false" aria-controls="collapse24">
                                    <div class="circle-icon"> <i class="fa fa-question"></i> </div>
                                    <span>Who pays the utility costs (electricity, gas, etc)?</span>
                                </button>
                                </button>
                            </h2>
                            <div id="collapse24" class="accordion-collapse collapse" aria-labelledby="headingThree"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body"> There isn't a single, right approach to house sit. Every home is different, and everything is negotiable with the owner. When a sitter looks after the owner's house and pets, the owner is typically willing to pay the utilities. It is typical for the house sitter to help with, or even pay for, the price of utilities like heating, air conditioning, electricity, and maybe internet for longer-term stays (four weeks or more).
                                    <br>
                                    Since every sitting job is different, it is up to the owner and the sitter to work out a payment plan for utilities before the sit starts. To prevent any misunderstandings, it is crucial that the sitter and the owner are both transparent and explicit about the terms of the agreement and that it is recorded.

                                     </div>
                            </div>
                        </div> -->
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingThree">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapse25" aria-expanded="false" aria-controls="collapse25">
                                    <div class="circle-icon"> <i class="fa fa-question"></i> </div>
                                    <span>How much do you charge for registration?</span>
                                </button>
                                </button>
                            </h2>
                            <div id="collapse25" class="accordion-collapse collapse" aria-labelledby="headingThree"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body"> You can get luxurious accommodations all year round for less money than a single night's stay!
                                    <br>
                                    A 12-month subscription costs just £29 for house sitters. Unlike some other home sitting websites, we do not charge for metropolitan zoning, and there are no additional or hidden fees.
                                    <br>
                                    To secure your first house sit, start now! We display your profile 365 days a year!


                                     </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingThree">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapse26" aria-expanded="false" aria-controls="collapse26">
                                    <div class="circle-icon"> <i class="fa fa-question"></i> </div>
                                    <span>Is it really FREE for homeowners?</span>
                                </button>
                                </button>
                            </h2>
                            <div id="collapse26" class="accordion-collapse collapse" aria-labelledby="headingThree"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body"> Indeed. We don't charge homeowners in order to encourage more of them to use the website to post a sitter request. This translates to better value for your money since there will be more jobs available for sitters to apply for.

                                     </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingThree">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapse27" aria-expanded="false" aria-controls="collapse27">
                                    <div class="circle-icon"> <i class="fa fa-question"></i> </div>
                                    <span>What payment options do I have?</span>
                                </button>
                                </button>
                            </h2>
                            <div id="collapse27" class="accordion-collapse collapse" aria-labelledby="headingThree"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body"> The most popular method of payment is our credit card option, which allows you to use SumUp to make a simple, safe, one-step online payment. As an alternative, you can use PayPal to make an online payment.
                                     </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingThree">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapse28" aria-expanded="false" aria-controls="collapse28">
                                    <div class="circle-icon"> <i class="fa fa-question"></i> </div>
                                    <span>I have registered as a house sitter and made payment but have not received my login details?</span>
                                </button>
                                </button>
                            </h2>
                            <div id="collapse28" class="accordion-collapse collapse" aria-labelledby="headingThree"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body"> You should receive an email directing you to a portal where you can verify your login credentials shortly after registration. Please get in touch with us so we can resend this email to you if, after checking your junk mail, you still haven't gotten it after an hour.

                                     </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingThree">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapse29" aria-expanded="false" aria-controls="collapse29">
                                    <div class="circle-icon"> <i class="fa fa-question"></i> </div>
                                    <span>How do I contact home owners?</span>
                                </button>
                                </button>
                            </h2>
                            <div id="collapse29" class="accordion-collapse collapse" aria-labelledby="headingThree"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body"> A home owner can be contacted in two different ways. On the website, home owners typically post advertisements. These advertisements are visible to anyone, but only registered house sitters may use them to get in touch with the property owner.
                                    <br>
                                    Log in and click the advertisement to initiate contact with a homeowner. This is where you can get the home owner's phone number if they have chosen to share it. On the left side, there is a contact box where you can input and send a message. An email notification will be sent to you upon the home owner's reply.
                                    <br>
                                    As an alternative, the house owner can decide to get in touch with you directly rather than post an advertisement. Many homeowners would much rather use the in-site messaging system to quickly browse the sitter profiles and message those that catch their eye. (As a result, be sure your availability and profile information are current!)


                                     </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingThree">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapse30" aria-expanded="false" aria-controls="collapse30">
                                    <div class="circle-icon"> <i class="fa fa-question"></i> </div>
                                    <span>When can I start contacting home owners?</span>
                                </button>
                                </button>
                            </h2>
                            <div id="collapse30" class="accordion-collapse collapse" aria-labelledby="headingThree"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body"> It only takes five to ten minutes to register as a house sitter with Pet Lodgers. After registering, you can browse the advertising and get in touch with homeowners right away.

                                     </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingThree">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapse31" aria-expanded="false" aria-controls="collapse31">
                                    <div class="circle-icon"> <i class="fa fa-question"></i> </div>
                                    <span>Can you contact a home owner before I join to see if their advertisementis still current?</span>
                                </button>
                                </button>
                            </h2>
                            <div id="collapse31" class="accordion-collapse collapse" aria-labelledby="headingThree"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body"> Regretfully, we are unable to provide this service. If a home owner responds "yes" when we ask if their advertisementis still live, it may have already been filled by the time the house sitter registers and sends a message, leaving them as a disgruntled and irritated new member.
                                    <br>
                                    We get in touch with homeowners every five days to remind them to take down their outdated ads.


                                     </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingThree">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapse32" aria-expanded="false" aria-controls="collapse32">
                                    <div class="circle-icon"> <i class="fa fa-question"></i> </div>
                                    <span>Do you send out renewal reminders?</span>
                                </button>
                                </button>
                            </h2>
                            <div id="collapse32" class="accordion-collapse collapse" aria-labelledby="headingThree"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body"> Yes, we will send you an email reminder two weeks in advance and again two days prior to your membership expiration.

                                     </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingThree">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapse33" aria-expanded="false" aria-controls="collapse33">
                                    <div class="circle-icon"> <i class="fa fa-question"></i> </div>
                                    <span>Do you have auto-renewals?</span>
                                </button>
                                </button>
                            </h2>
                            <div id="collapse33" class="accordion-collapse collapse" aria-labelledby="headingThree"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body"> No, we don't! When your renewal is about to expire, we will send you an email. If you choose not to renew, there is nothing further for you to do!

                                     </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingThree">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapse34" aria-expanded="false" aria-controls="collapse34">
                                    <div class="circle-icon"> <i class="fa fa-question"></i> </div>
                                    <span>I don't have an email account is that going to be a problem?</span>
                                </button>
                                </button>
                            </h2>
                            <div id="collapse34" class="accordion-collapse collapse" aria-labelledby="headingThree"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body"> In order to activate your profile upon first registration, you do require an email account. The in-site message system is typically used for first communication, but once you've registered, you can opt to be contacted by phone if that's more convenient. Your chances may be diminished if you don't regularly have access to emails because it will be harder to reply right away.

                                     </div>
                            </div>
                        </div>
                        <!-- <div class="accordion-item">
                            <h2 class="accordion-header" id="headingThree">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapse35" aria-expanded="false" aria-controls="collapse35">
                                    <div class="circle-icon"> <i class="fa fa-question"></i> </div>
                                    <span>How does Pet Lodger work?</span>
                                </button>
                                </button>
                            </h2>
                            <div id="collapse35" class="accordion-collapse collapse" aria-labelledby="headingThree"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body">Upon registering as a sitter on the Pet Lodgers website, thousands of UK homeowners can access the profile you build. Then, these property owners get in touch with you personally to ask if you're available and interested in house sitting.
                                    <br>
                                    A lot of homeowners decide to only post advertising. You can look through the adverts to locate ones that catch your eye, and then get in touch with the owner to let them know you're interested. We advise taking the initiative, so to improve your chances of landing the perfect sit, get in touch with the homeowners and explain why you are the right sitter for them!


                                     </div>
                            </div>
                        </div> -->
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingThree">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapse36" aria-expanded="false" aria-controls="collapse36">
                                    <div class="circle-icon"> <i class="fa fa-question"></i> </div>
                                    <span>Do you advertise to home owners?</span>
                                </button>
                                </button>
                            </h2>
                            <div id="collapse36" class="accordion-collapse collapse" aria-labelledby="headingThree"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body"> Indeed! Every day of the year, we invest a significant amount of time and resources in this endeavour through various channels to entice homeowners to list with us. We think you'll get better value for your money and more jobs to apply for if more homeowners use our site to post sitter-related ads.

                                     </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingThree">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapse37" aria-expanded="false" aria-controls="collapse37">
                                    <div class="circle-icon"> <i class="fa fa-question"></i> </div>
                                    <span>Are all the home owner ads on Pet Lodger still active?</span>
                                </button>
                                </button>
                            </h2>
                            <div id="collapse37" class="accordion-collapse collapse" aria-labelledby="headingThree"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body"> To the best of Pet Lodgers knowledge, every homeowner advertisement displayed on our platform is live and accessible; yet, we do depend on the homeowner to take down their own ad. To prevent house sitter disappointment, we emphasise to all home owners the necessity of removing their advertisement as soon as they have filled the house sitting position. Every homeowner is able to change, activate, and deactivate their advertisement at any time of day.

                                     </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingThree">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapse38" aria-expanded="false" aria-controls="collapse38">
                                    <div class="circle-icon"> <i class="fa fa-question"></i> </div>
                                    <span>How is the house sitter list ordered?</span>
                                </button>
                                </button>
                            </h2>
                            <div id="collapse38" class="accordion-collapse collapse" aria-labelledby="headingThree"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body"> Your profile will appear at the top of the list each time you LOG IN or click the MY ACCOUNT link (up to once per hour).
                                    We advise you to do this on a regular basis so that homeowners can locate you and are more inclined to get in touch with you directly. According to this system, house sitters who are actively looking for work will remain close to the top of the list, while those who are already on a house sit or don't need one will filter down the list.


                                     </div>
                            </div>
                        </div>
                        <!-- <div class="accordion-item">
                            <h2 class="accordion-header" id="headingThree">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapse39" aria-expanded="false" aria-controls="collapse39">
                                    <div class="circle-icon"> <i class="fa fa-question"></i> </div>
                                    <span>Reply Rating - How does it work?</span>
                                </button>
                                </button>
                            </h2>
                            <div id="collapse39" class="accordion-collapse collapse" aria-labelledby="headingThree"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body"> All members should have faster and more enjoyable conversation thanks to the reply rating system. A member's home owner advertisementor sitter profile displays a reply rating as a set of five dots. This assigns a score to the member's initial contact message response.
                                    A member's reply rating will stay at the optimal five points if they have answered all first contact messages promptly—that is, within five days.
                                    One point is taken away for each initial message of contact that is not returned. The member must respond right away to the next two first contact messages in order to reclaim a lost point.


                                     </div>
                            </div>
                        </div> -->
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingThree">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapse40" aria-expanded="false" aria-controls="collapse40">
                                    <div class="circle-icon"> <i class="fa fa-question"></i> </div>
                                    <span>How do Reviews work?</span>
                                </button>
                                </button>
                            </h2>
                            <div id="collapse40" class="accordion-collapse collapse" aria-labelledby="headingThree"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body"> Reviews from prior tenants give your profile a lot of legitimacy and highlight and encourage good experiences.
                                    <br>
                                    Up to 14 days after the house sit has ended, both house sitters and homeowners can review and rate each other's work. The sitter profile, as well as the owner's subsequent advertisements and messaging exchanges, automatically display these reviews and ratings.
                                    <br>
                                    There are four areas covered by the star ratings, with 1–5 stars allowed for each:
                                    <br>
                                    •	Pets
                                    •	Home
                                    •	Garden
                                    •	Communication
                                    <br>
                                    The overall star rating, which ranges from 1 to 5, will be calculated by averaging these individual star ratings. An item can be recorded as N/A and removed from the star rating if it is irrelevant (for example, there was no garden).
                                    <br>
                                    Each participant may reply to the review only once. This reply appears below the review on their advertisement, profile, or message exchange.
                                    <br>
                                    In addition, members have the option to "feature" reviews, which places the selected review at the top of their list of reviews. Additionally, the preview of a house sitter's profile includes this "featured" review.

                                     </div>
                            </div>
                        </div>
                        <!-- <div class="accordion-item">
                            <h2 class="accordion-header" id="headingThree">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapse41" aria-expanded="false" aria-controls="collapse41">
                                    <div class="circle-icon"> <i class="fa fa-question"></i> </div>
                                    <span>How long does it take Pet Lodger to reply to email enquiries?</span>
                                </button>
                                </button>
                            </h2>
                            <div id="collapse41" class="accordion-collapse collapse" aria-labelledby="headingThree"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body"> Our customer service is our first priority, and we make it a point to respond to all email inquiries the same day they are received. Please provide 48 hours, as demand may require.

                                     </div>
                            </div>
                        </div> -->
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingThree">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapse42" aria-expanded="false" aria-controls="collapse42">
                                    <div class="circle-icon"> <i class="fa fa-question"></i> </div>
                                    <span>What is the ID verification?</span>
                                </button>
                                </button>
                            </h2>
                            <div id="collapse42" class="accordion-collapse collapse" aria-labelledby="headingThree"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body"> It is possible for house sitters to have the primary account holder's ID validated. To be considered as ID verified, just the primary account holder's identity must be validated.
                                    After their verification is successful, house sitters will have an ID badge icon added to their sitter profile. House sitters have the choice to use this service.


                                     </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingThree">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapse43" aria-expanded="false" aria-controls="collapse43">
                                    <div class="circle-icon"> <i class="fa fa-question"></i> </div>
                                    <span>How does it work?</span>
                                </button>
                                </button>
                            </h2>
                            <div id="collapse43" class="accordion-collapse collapse" aria-labelledby="headingThree"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body"> For our ID verification, we have enlisted the help of Trulioo Global Gateway, a globally reputable service that operates at all levels of government and business. The sole goal of cross-referencing personal information with public databases is to ensure that an individual is who they claim to be.
                                    <br>
                                    To be considered as ID verified, just the primary account holder's identity must be validated. There is a £3 one-time verification fee if you choose to use this option. Date of Birth + Address is the primary information required (for UK residents only; other options are available for international sitters).
                                    <br>
                                    The sitter profile displays an ID Verification badge icon to indicate that the ID has been successfully validated.
                                    <br>
                                    Please be aware that you only have two chances to pass the system, and we cannot ensure that your verification will be successful. Please get help from Pet Lodgers support if this occurs.


                                     </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingThree">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapse44" aria-expanded="false" aria-controls="collapse44">
                                    <div class="circle-icon"> <i class="fa fa-question"></i> </div>
                                    <span>How much does it cost?</span>
                                </button>
                                </button>
                            </h2>
                            <div id="collapse44" class="accordion-collapse collapse" aria-labelledby="headingThree"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body"> The one-time fee for an ID verification is £3.
                                    <br>
                                    Regretfully, we are unable to reimburse the ID verification payment and cannot ensure that you will be successfully confirmed because the fee is the same for a successful and unsuccessful verification.

                                     </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingThree">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapse45" aria-expanded="false" aria-controls="collapse45">
                                    <div class="circle-icon"> <i class="fa fa-question"></i> </div>
                                    <span>I'm not from the UK, can I still be verified?</span>
                                </button>
                                </button>
                            </h2>
                            <div id="collapse45" class="accordion-collapse collapse" aria-labelledby="headingThree"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body"> Indeed. Foreign house sitters are free to make use of the possibilities that are accessible to them (which will vary based on the nation in which they live).

                                     </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingThree">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapse46" aria-expanded="false" aria-controls="collapse46">
                                    <div class="circle-icon"> <i class="fa fa-question"></i> </div>
                                    <span>How do I pass the ID verification successfully?</span>
                                </button>
                                </button>
                            </h2>
                            <div id="collapse46" class="accordion-collapse collapse" aria-labelledby="headingThree"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body"> The following are crucial guidelines to adhere to in order to effectively have your ID verified:
                                    <br>
                                    Only the primary account holder listed on your sitter's account may be verified.
                                    <br>
                                    Only ONE of the ID data checking options must be completed.
                                    <br>
                                    The names and numbers on your card or document must be entered EXACTLY as they appear.
                                    <br>
                                    You have two chances to enter your data, so please take care. If you try twice and it doesn't work, you'll need to get in touch with our support staff.
                                    If you try again after failing the first time and your information is accurate, please use a different ID.
                                    <br>
                                    Only the options that are selected are available to foreign house sitters.
                                    <br>
                                    ID verifications through the Trulioo Global Gateway might not always be successful. If this turns out to be the case, we apologise. Sadly, there is no other method for us to verify you.


                                     </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingThree">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapse47" aria-expanded="false" aria-controls="collapse47">
                                    <div class="circle-icon"> <i class="fa fa-question"></i> </div>
                                    <span>What if I am unsuccessful on both my attempts?</span>
                                </button>
                                </button>
                            </h2>
                            <div id="collapse47" class="accordion-collapse collapse" aria-labelledby="headingThree"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body"> Make sure you enter your information precisely as it appears on your card or paper to avoid failure. Any middle names or initials that show up on your identity documents fall under this category.
                                    <br>
                                    Should you have made two attempts and failed each time, kindly reach out to Pet Lodgers support for further assistance.

                                     </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingThree">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapse48" aria-expanded="false" aria-controls="collapse48">
                                    <div class="circle-icon"> <i class="fa fa-question"></i> </div>
                                    <span>Who does the ID Verification?</span>
                                </button>
                                </button>
                            </h2>
                            <div id="collapse48" class="accordion-collapse collapse" aria-labelledby="headingThree"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body"> The internationally known Trulioo Global Gateway, which serves all governmental and corporate levels, offers ID verification. The sole goal of cross-referencing personal information with public databases is to ensure that an individual is who they claim to be. These databases, which vary by nation, are all reputable, safe, and compliant sources with stringent guidelines, such as credit agencies and government departments.
                                    <br>
                                    No personal information that is not already in one of our member accounts is stored by Pet Lodgers on our website. In order to provide help if needed, the only information we keep as part of this ID verification procedure is the member’s name, the verification transaction ID, and the payment confirmation. To learn more, check our privacy policy by clicking here.


                                     </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingThree">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapse49" aria-expanded="false" aria-controls="collapse49">
                                    <div class="circle-icon"> <i class="fa fa-question"></i> </div>
                                    <span>Do I need ID Verification?</span>
                                </button>
                                </button>
                            </h2>
                            <div id="collapse49" class="accordion-collapse collapse" aria-labelledby="headingThree"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body"> No. Verification of ID is entirely voluntary.
                                    There are still plenty of additional methods you can do to reassure homeowners that they made the right choice in choosing you to sit their house if you decide against requesting ID verification. An engaging photo and a well-written profile, for instance, are excellent places to start. Positive evaluations undoubtedly assist, and it's always advantageous to be able to provide references or police reports.



                                     </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingThree">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapse50" aria-expanded="false" aria-controls="collapse50">
                                    <div class="circle-icon"> <i class="fa fa-question"></i> </div>
                                    <span>Who house sits?</span>
                                </button>
                                </button>
                            </h2>
                            <div id="collapse50" class="accordion-collapse collapse" aria-labelledby="headingThree"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body"> Housesitting clients come in a wide variety of forms: retired couples, home-based professionals, singles, young families, and people who enjoy meeting new people and travelling. While there isn't a single archetypal "sitter," all sitters are considerate, accountable, and have a wealth of life experience.
                                    <br>
                                    There are as many different reasons as there are people who house sit. Many people who have owned pets in the past yearn to rekindle their unique bond with a pet. Some travel and take advantage of the advantages of property ownership while doing it as their way of life. For the most part, house sitters really relish the change of pace and the opportunity to get to know different animals and people.



                                     </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingThree">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapse51" aria-expanded="false" aria-controls="collapse51">
                                    <div class="circle-icon"> <i class="fa fa-question"></i> </div>
                                    <span>Why do people house sit for free?</span>
                                </button>
                                </button>
                            </h2>
                            <div id="collapse51" class="accordion-collapse collapse" aria-labelledby="headingThree"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body"> Why someone would opt to house sit for free may be on your mind. The reason is actually that they adore animals and the distinctive vacation opportunities that house and pet sitting offers!
                                    <br>
                                    Sitters receive a plethora of perks in return for looking after your house and dogs, such as the chance to experience life in your area, interact with your adorable fur babies, and feel good about lending a helping hand.


                                     </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingThree">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapse52" aria-expanded="false" aria-controls="collapse52">
                                    <div class="circle-icon"> <i class="fa fa-question"></i> </div>
                                    <span>What is expected of the sitter?</span>
                                </button>
                                </button>
                            </h2>
                            <div id="collapse52" class="accordion-collapse collapse" aria-labelledby="headingThree"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body"> Your pets will be happy and safe in a familiar environment because the house sitter loves them as much as you do and lives in your empty home.
                                    <br>
                                    They take care of your house's daily tasks, like setting out the Dustbins and gathering mail. In addition, sitters can take care of any additional tasks you and your partner decide on, like gardening and yard care. Additionally, having a sitter occupy your home makes it far safer than leaving it unattended.



                                     </div>
                            </div>
                        </div>
                        <!-- <div class="accordion-item">
                            <h2 class="accordion-header" id="headingThree">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapse53" aria-expanded="false" aria-controls="collapse53">
                                    <div class="circle-icon"> <i class="fa fa-question"></i> </div>
                                    <span>Do you recommend using a house sitting agreement?</span>
                                </button>
                                </button>
                            </h2>
                            <div id="collapse53" class="accordion-collapse collapse" aria-labelledby="headingThree"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body"> You can work out a deal with the sitter on this. Clarifying your expectations and ensuring that everyone is aware of the parameters of the arrangement are two benefits of having a home sitting agreement. To prevent confusion, it is crucial to go over every detail of the house sit before it starts. When it comes to making sure that everything in the house works properly, this may really make a difference. Terms that could be mentioned in the contract include things like how the pet will be cared for, how to take care of the house and garden, who will pay the utilities, what to do in an emergency, etc.
                                    <br>
                                    You can customise a housesitting agreement template from Pet Lodgers by finding it in the "Useful Tools" section of the menu on the left.



                                     </div>
                            </div>
                        </div> -->
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingThree">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapse54" aria-expanded="false" aria-controls="collapse54">
                                    <div class="circle-icon"> <i class="fa fa-question"></i> </div>
                                    <span>Is it really FREE for home owners?</span>
                                </button>
                                </button>
                            </h2>
                            <div id="collapse54" class="accordion-collapse collapse" aria-labelledby="headingThree"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body"> Indeed! For helping homeowners find a house sitter, we don't charge anything.


                                     </div>
                            </div>
                        </div>
                        <!--<div class="accordion-item">-->
                        <!--    <h2 class="accordion-header" id="headingThree">-->
                        <!--        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"-->
                        <!--            data-bs-target="#collapse55" aria-expanded="false" aria-controls="collapse55">-->
                        <!--            <div class="circle-icon"> <i class="fa fa-question"></i> </div>-->
                        <!--            <span>Do home owners pay the house sitter?</span>-->
                        <!--        </button>-->
                        <!--        </button>-->
                        <!--    </h2>-->
                        <!--    <div id="collapse55" class="accordion-collapse collapse" aria-labelledby="headingThree"-->
                        <!--        data-bs-parent="#accordionExample">-->
                        <!--        <div class="accordion-body"> The most popular kind of house sitting has the sitter staying for free in exchange for watching the house and the pets; no money is exchanged. A homeowner could occasionally make a financial offer to the house caretaker. This can be the result of having numerous pets to take care of or an increased workload.-->
                        <!--            <br>-->
                        <!--            Some of the qualified sitters that use Pet Lodgers to promote their services demand payment in exchange for their expert care. We require sitters to be upfront about their expectation of money in their profile. Most house sitters are animal lovers who feel that offering free lodging in return for helping out around the house and with pets is a just and beneficial trade of services.-->



                        <!--             </div>-->
                        <!--    </div>-->
                        <!--</div>-->
                        <!--<div class="accordion-item">-->
                        <!--    <h2 class="accordion-header" id="headingThree">-->
                        <!--        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"-->
                        <!--            data-bs-target="#collapse56" aria-expanded="false" aria-controls="collapse56">-->
                        <!--            <div class="circle-icon"> <i class="fa fa-question"></i> </div>-->
                        <!--            <span>Does the house sitter pay rent to the home owner?</span>-->
                        <!--        </button>-->
                        <!--        </button>-->
                        <!--    </h2>-->
                        <!--    <div id="collapse56" class="accordion-collapse collapse" aria-labelledby="headingThree"-->
                        <!--        data-bs-parent="#accordionExample">-->
                        <!--        <div class="accordion-body"> Home owners are not permitted to charge house sitters rent by Pet Lodgers. Most of the time, there is a simple trade in which the house sitter provides free lodging in exchange for taking care of the house and pets. A house owner could occasionally ask the house sitter for a weekly contribution. This can occur if the house sit is for a longer duration, or if there are no pets to take care of and not many tasks to complete. Recall that before finalising your home sit, all the details should be discussed and are negotiable between the two parties.-->


                        <!--             </div>-->
                        <!--    </div>-->
                        <!--</div>-->
                        <!--<div class="accordion-item">-->
                        <!--    <h2 class="accordion-header" id="headingThree">-->
                        <!--        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"-->
                        <!--            data-bs-target="#collapse57" aria-expanded="false" aria-controls="collapse57">-->
                        <!--            <div class="circle-icon"> <i class="fa fa-question"></i> </div>-->
                        <!--            <span>Who pays the utility costs (electricity, gas, etc)?</span>-->
                        <!--        </button>-->
                        <!--        </button>-->
                        <!--    </h2>-->
                        <!--    <div id="collapse57" class="accordion-collapse collapse" aria-labelledby="headingThree"-->
                        <!--        data-bs-parent="#accordionExample">-->
                        <!--        <div class="accordion-body"> There isn't a single, right approach to house sit. Everything is negotiated between you and the sitter because every house sit is different. When a sitter looks after the owner's house and pets, the owner is typically willing to pay the utilities. During extended stays, such as four weeks or more, the house sitter typically pays a portion of the utility bills, including those for electricity, heating, cooling, and potentially internet.-->
                        <!--            <br>-->
                        <!--            Since every sitting job is different, it is up to the owner and the sitter to work out a payment plan for utilities before the sit starts. To prevent any misunderstandings, it is crucial that the sitter and the owner are both transparent and explicit about the terms of the agreement and that it is recorded.-->
                        <!--            <br>-->
                        <!--            * Your house listing and initial message to the house sitter must clearly state whether you do require them to make any kind of financial contribution.-->




                        <!--             </div>-->
                        <!--    </div>-->
                        <!--</div>-->
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingThree">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapse58" aria-expanded="false" aria-controls="collapse58">
                                    <div class="circle-icon"> <i class="fa fa-question"></i> </div>
                                    <span>Who does the ID Verification?</span>
                                </button>
                                </button>
                            </h2>
                            <div id="collapse58" class="accordion-collapse collapse" aria-labelledby="headingThree"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body"> The internationally known Trulioo Global Gateway, which serves all governmental and corporate levels, offers ID verification. The sole goal of cross-referencing personal information with public databases is to ensure that an individual is who they claim to be. These databases, which vary by nation, are all reputable, safe, and compliant sources with stringent guidelines, such as credit agencies and government departments.
                                    <br>

                                    No personal information that is not already in one of our member accounts is stored by Pet Lodgers on our website. In order to provide help if needed, the only information we keep as part of this ID verification procedure is the member’s name, the verification transaction ID, and the payment confirmation. To learn more, check our privacy policy by clicking here.


                                     </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingThree">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapse59" aria-expanded="false" aria-controls="collapse59">
                                    <div class="circle-icon"> <i class="fa fa-question"></i> </div>
                                    <span>What happens if my house gets damaged?</span>
                                </button>
                                </button>
                            </h2>
                            <div id="collapse59" class="accordion-collapse collapse" aria-labelledby="headingThree"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body">Ninety-five percent of the time, the house runs well. In the rare event that the sitter breaks something or causes damage, they will typically pay for it if it was their fault. The expense of repairs should be borne by the homeowner if the damage was brought on by the ageing of the house, normal wear and tear on an item, etc.
                                    <br>
                                    To avoid any possible issues, some homeowners prefer to employ a house sitting agreement. You can customise the house sitting agreement template provided by Pet Lodgers to meet your needs.



                                     </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingThree">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapse60" aria-expanded="false" aria-controls="collapse60">
                                    <div class="circle-icon"> <i class="fa fa-question"></i> </div>
                                    <span>How long does it take for my advertisement to be approved?</span>
                                </button>
                                </button>
                            </h2>
                            <div id="collapse60" class="accordion-collapse collapse" aria-labelledby="headingThree"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body"> Throughout the day, we regularly authorise ads. All ads are usually approved 24 hours after they are filed.


                                     </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingThree">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapse61" aria-expanded="false" aria-controls="collapse61">
                                    <div class="circle-icon"> <i class="fa fa-question"></i> </div>
                                    <span>How do I de-activate (take down) my ad?</span>
                                </button>
                                </button>
                            </h2>
                            <div id="collapse61" class="accordion-collapse collapse" aria-labelledby="headingThree"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body"> 1)Access your account by logging in. <br>
                                    2) Select 'Deactivate This Ad' from the menu at the top of your advertisement.
                                    <br>
                                    In case your advertisement isn't displayed right away when you log in, just select 'My House Ads' from the menu on the left, and then go to step 2.
                                    <br>
                                    When you deactivate your ad, sitters are no longer able to apply because it is no longer listed among the available advertising on the platform. This prevents sitter dissatisfaction and ensures that you are not contacted needlessly. If you ever need a sitter again, you can utilise your advertisementand any related information again because they are saved in your account. You can message any sitter that contacted you, even when your advertisementhas been removed. It's simple to revive your advertisement if necessary.
                                    <br>
                                    NOTE: If you would like us to deactivate your advertisement, you may also email us



                                     </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingThree">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapse62" aria-expanded="false" aria-controls="collapse62">
                                    <div class="circle-icon"> <i class="fa fa-question"></i> </div>
                                    <span>When should I deactivate (take down) my ad?</span>
                                </button>
                                </button>
                            </h2>
                            <div id="collapse62" class="accordion-collapse collapse" aria-labelledby="headingThree"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body"> Kindly deactivate your advertisement as soon as possible.
                                    <br>
                                    A significant number of sitters have contacted you to allow you to make a decision, OR you have already chosen a sitter, OR
                                    <br>
                                    We've cancelled your appointment.
                                    Other factors can warrant deactivating your advertisement. To avoid being contacted needlessly by potential sitters, we kindly ask that you make sure your advertisementis cancelled as soon as it is no longer necessary.



                                     </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingThree">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapse63" aria-expanded="false" aria-controls="collapse63">
                                    <div class="circle-icon"> <i class="fa fa-question"></i> </div>
                                    <span>What if a sitter contacts me and they aren't a good match?</span>
                                </button>
                                </button>
                            </h2>
                            <div id="collapse63" class="accordion-collapse collapse" aria-labelledby="headingThree"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body"> It is anticipated that you will respond to every communication that you get. With the "Quick Reply" and "Group Reply" options, we have made this really simple.
                                    <br>
                                    Please respond as quickly as you can, saying anything as basic as "Thank you for your interest," if someone has gotten in touch with you and you would prefer not to have them be your sitter. I apologise that this time around, your application was not accepted. The sitter is now free to take advantage of other opportunities.




                                     </div>
                            </div>
                        </div>
                        <!-- <div class="accordion-item">
                            <h2 class="accordion-header" id="headingThree">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapse64" aria-expanded="false" aria-controls="collapseThree">
                                    <div class="circle-icon"> <i class="fa fa-question"></i> </div>
                                    <span>I don't have an email account is that going to be a problem?</span>
                                </button>
                                </button>
                            </h2>
                            <div id="collapse64" class="accordion-collapse collapse" aria-labelledby="headingThree"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body"> To activate your account when you initially register, you must have an email address. The in-site message system is typically used for first communication, but once you've registered, you can opt to be contacted by phone if that's more convenient. You could discover that it is more difficult to get a sitter if you don't have regular access to email.


                                     </div>
                            </div>
                        </div> -->
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingThree">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapse65" aria-expanded="false" aria-controls="collapse65">
                                    <div class="circle-icon"> <i class="fa fa-question"></i> </div>
                                    <span>Can I leave someone in the house or property and still engage a house sitter?</span>
                                </button>
                                </button>
                            </h2>
                            <div id="collapse65" class="accordion-collapse collapse" aria-labelledby="headingThree"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body"> Certainly, with prior agreement and arrangement, either a family member or a tenant sharing the house can be considered.


                                     </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingThree">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapse66" aria-expanded="false" aria-controls="collapse66">
                                    <div class="circle-icon"> <i class="fa fa-question"></i> </div>
                                    <span>Can I use a house sitter if I AirBnB?</span>
                                </button>
                                </button>
                            </h2>
                            <div id="collapse66" class="accordion-collapse collapse" aria-labelledby="headingThree"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body"> Indeed. AirBnB and other home-based enterprises with a commercial focus are permitted, but the house sitter needs to get paid for their services. The house owner advertisement needs to make this very obvious.
                                    <br>
                                    Any AirBnB accommodations must be entirely separate since we do not let anyone to live in the same house as the sitter.



                                     </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingThree">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapse67" aria-expanded="false" aria-controls="collapse67">
                                    <div class="circle-icon"> <i class="fa fa-question"></i> </div>
                                    <span>What if I have security cameras in my home?</span>
                                </button>
                                </button>
                            </h2>
                            <div id="collapse67" class="accordion-collapse collapse" aria-labelledby="headingThree"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body"> When negotiating the house sitting job, it's crucial to let the house sitter know if your home has security cameras inside or outside. It is important to let house sitters know if there are security cameras placed so they may make an informed decision before the home sit is confirmed. Sitters could or might not feel comfortable with cameras.


                                     </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingThree">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapse68" aria-expanded="false" aria-controls="collapse68">
                                    <div class="circle-icon"> <i class="fa fa-question"></i> </div>
                                    <span>How does Pet Lodger work?</span>
                                </button>
                                </button>
                            </h2>
                            <div id="collapse68" class="accordion-collapse collapse" aria-labelledby="headingThree"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body"> Pet Lodgers registered sitters can get in touch with you to indicate interest in a house sit once you post your ad. After that, you can interact with the sitter you believe is the best fit for you by looking over their profile.
                                    <br>
                                    Some owners decide not to run an advertisement. If this sounds like you, all you have to do is look through the sitter profiles on the website and use the contact form to get in touch with the sitters that catch your eye.
                                    <br>
                                    Simple!



                                     </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingThree">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapse69" aria-expanded="false" aria-controls="collapse69">
                                    <div class="circle-icon"> <i class="fa fa-question"></i> </div>
                                    <span>Do you vet sitters?</span>
                                </button>
                                </button>
                            </h2>
                            <div id="collapse69" class="accordion-collapse collapse" aria-labelledby="headingThree"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body"> No screening is done on our sitters. We serve as a meeting spot where house owners and sitters can only locate one another. Being a homeowner gives you the freedom to request anything you require in order to feel assured that you are with the proper individual. You should definitely ask for references, preferably from someone you can reach by phone to verify the sitter, and you may inquire about reviews, police clearances, and other information.
                                    <br>
                                    Most homeowners feel extremely comfortable with the process after talking to a few sitters. In their profile, a lot of sitters also provide references and police clearances. You are free to look through as many sitter profiles as you'd like to find the best suitable sitters to get in touch with.


                                     </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingThree">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapse70" aria-expanded="false" aria-controls="collapse70">
                                    <div class="circle-icon"> <i class="fa fa-question"></i> </div>
                                    <span>How do I find a house sitter using your website?</span>
                                </button>
                                </button>
                            </h2>
                            <div id="collapse70" class="accordion-collapse collapse" aria-labelledby="headingThree"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body"> It's simple! You have two options: scroll through the list of sitter profiles and get in touch with those whose available dates and profile fit you, or post a free advertisementand let our registered house sitters get in touch with you. To improve your chances of finding the ideal house sitter, we advise doing both.


                                     </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingThree">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapse71" aria-expanded="false" aria-controls="collapse71">
                                    <div class="circle-icon"> <i class="fa fa-question"></i> </div>
                                    <span>Reply Rating - how does it work?</span>
                                </button>
                                </button>
                            </h2>
                            <div id="collapse71" class="accordion-collapse collapse" aria-labelledby="headingThree"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body"> All members should have faster and more enjoyable conversation thanks to the reply rating system. A member's home owner advertisementor sitter profile displays a reply rating as a set of five dots. This assigns a score to the member's initial contact message response.
                                    <br>
                                    A member's reply rating will stay at the optimal five points if they have answered all first contact messages promptly—that is, within five days.
                                    One point is taken away for each initial message of contact that is not returned. The member must respond right away to the next two first contact messages in order to reclaim a lost point.


                                     </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingThree">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapse72" aria-expanded="false" aria-controls="collapse72">
                                    <div class="circle-icon"> <i class="fa fa-question"></i> </div>
                                    <span>How do Reviews work?</span>
                                </button>
                                </button>
                            </h2>
                            <div id="collapse72" class="accordion-collapse collapse" aria-labelledby="headingThree"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body"> Reviews from prior tenants give your profile a lot of legitimacy and highlight and encourage good experiences.
                                    <br>
                                    Up to 14 days after the house sit has ended, both house sitters and homeowners can review and rate each other's work. The sitter profile, as well as the owner's subsequent advertisements and messaging exchanges, automatically display these reviews and ratings.
                                    There are four areas covered by the star ratings, with 1–5 stars allowed for each:
                                    <br>
                                    •	Pets
                                    •	Home
                                    •	Garden
                                    •	Communication
                                    <br>
                                    The overall star rating, which ranges from 1 to 5, will be calculated by averaging these individual star ratings. An item can be recorded as N/A and removed from the star rating if it is irrelevant (for example, there was no garden).
                                    <br>
                                    Each participant may reply to the review only once. This reply appears below the review on their advertisement, profile, or message exchange.
                                    <br>
                                    In addition, members have the option to "feature" reviews, which places the selected review at the top of their list of reviews. Additionally, the preview of a house sitter's profile includes this "featured" review.




                                     </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingThree">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapse73" aria-expanded="false" aria-controls="collapse73">
                                    <div class="circle-icon"> <i class="fa fa-question"></i> </div>
                                    <span>What do membership badges on a sitter profile mean?</span>
                                </button>
                                </button>
                            </h2>
                            <div id="collapse73" class="accordion-collapse collapse" aria-labelledby="headingThree"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body"> Rewarding devotion with membership badges is contingent upon the length of time a sitter has worked with us.
                                    <br>
                                    One can obtain the SILVER badge following a full year of membership.
                                    One can obtain the GOLD badge following a full year of membership.
                                    <br>
                                    Three years of membership are required to obtain the PLATINUM badge.
                                    Homeowners can find out how long a sitter has been listed with us in a convenient method.



                                     </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingThree">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapse74" aria-expanded="false" aria-controls="collapse74">
                                    <div class="circle-icon"> <i class="fa fa-question"></i> </div>
                                    <span>How long does it take Pet Lodger to reply to email enquiries?</span>
                                </button>
                                </button>
                            </h2>
                            <div id="collapse74" class="accordion-collapse collapse" aria-labelledby="headingThree"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body"> Our customer service is our first priority, and we make it a point to respond to all email inquiries the same day they are received. Please provide 48 hours, as demand may require


                                     </div>
                            </div>
                        </div>
                        <!-- <div class="accordion-item">
                            <h2 class="accordion-header" id="headingThree">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapse75" aria-expanded="false" aria-controls="collapse75">
                                    <div class="circle-icon"> <i class="fa fa-question"></i> </div>
                                    <span>What is the ID Verification?</span>
                                </button>
                                </button>
                            </h2>
                            <div id="collapse75" class="accordion-collapse collapse" aria-labelledby="headingThree"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body"> The process of ID verification involves cross-referencing an individual's personal information with publicly available databases in order to verify that they are who they claim to be.
                                    <br>
                                    The internationally known Trulioo Global Gateway, which serves all governmental and corporate levels, offers ID verification.
                                    <br>
                                    Verification of the primary account holder is an option available to house sitters. An ID Verification badge symbol appears on the sitter profile for your reference when this has been completed successfully.



                                     </div>
                            </div>
                        </div> -->
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingThree">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapse76" aria-expanded="false" aria-controls="collapse76">
                                    <div class="circle-icon"> <i class="fa fa-question"></i> </div>
                                    <span>As a home owner, do I need ID Verification?</span>
                                </button>
                                </button>
                            </h2>
                            <div id="collapse76" class="accordion-collapse collapse" aria-labelledby="headingThree"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body"> No, only house sitters are eligible for ID verification.


                                     </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingThree">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapse77" aria-expanded="false" aria-controls="collapse77">
                                    <div class="circle-icon"> <i class="fa fa-question"></i> </div>
                                    <span>What if a house sitter doesn't have ID Verification?</span>
                                </button>
                                </button>
                            </h2>
                            <div id="collapse77" class="accordion-collapse collapse" aria-labelledby="headingThree"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body"> House sitters may decide not to have their identification checked. This may occur for a variety of reasons, the primary one being a fear of identity theft and the unwillingness to provide personal information online. Since we are aware of this, ID verification is voluntary.
                                    <br>
                                    When hiring a home sitter, there are plenty more things you can do to make yourself feel at ease. You can meet the sitter in person, ask to see their driver's licence or other identification if you feel it's necessary, ask for references you can reach directly by phone, find out if the sitter has had a police check, read any reviews from past house sits that show up on their sitter profile.


                                     </div>
                            </div>
                        </div>
						<div class="desc">
							<p><b> Note for Pet Owner: </b> The relevant information is as follows..
One of the Pet Lodger members will arrive at your home and take over as if you are still there following your routine You need to write/print off what you require, i.e., when, where, and what you feed your pet. When you walk them, where they sleep etc
Vets details and written permission to take to the vet's if necessary.
Where your stop tap and fuse box is located. WiFi and TV passwords or numbers. Anything else you feel relevant
information emergency contact if we can not get hold of you.</p>
						</div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{-- Contact 1 Ends --}}
@endsection