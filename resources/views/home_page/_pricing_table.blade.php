

    <section class="pricing-plan">
        <div class="container">
            <div class="pricing-main">
                <div class="row">
                    <div class="switch-table d-flex justify-content-center align-items-center">
                        <div class="text-monthly">Monthly </div>
                        <label class = "custom-switch">
                            <span></span>
                            <input type="checkbox" class="toggle-switch">
                        </label>
                        <div class="text-yearly">Yearly</div>
                    </div>
                </div>
                <div class="row">
                    
                    <div class="col-md-4">
                        <div class="pricing-table">
                            <div class="silver-header">
                                <h3>Silver</h3>
                            </div>
                            <div class="price">
                                <div class="monthly-price">
                                    <div class="currency">£</div>
                                    <div class="amount">15</div>
                                </div>
                                <div class="Yearly-price">
                                    <div class="currency">£</div>
                                    <div class="amount">120</div>
                                </div>
                            </div>
                            <div class="body">
                                <ul>
                                    <li> <i class="fa fa-check"></i> One Admin</li>
                                    <li> <i class="fa fa-check"></i> No user</li>
                                    <li> <i class="fa fa-check"></i> Unlimited clients</li>
                                    <li> <i class="fa fa-check"></i> Unlimited Files</li>
                                    <li> <i class="fa fa-check"></i> Unlimited Folders</li>
                                </ul>
                            </div>
                            <div class="footer silver-footer">
                                <a href="">Start now</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="pricing-table">
                            <div class="gold-header">
                                <h3>Gold</h3>
                            </div>
                            <div class="price">
                                <div class="monthly-price">
                                    <div class="currency">£</div>
                                    <div class="amount">20</div>
                                </div>
                                <div class="Yearly-price">
                                    <div class="currency">£</div>
                                    <div class="amount">180</div>
                                </div>
                            </div>
                            <div class="body">
                                <ul>
                                    <li><i class="fa fa-check"></i> One Admin</li>
                                    <li><i class="fa fa-check"></i> 5 user</li>
                                    <li><i class="fa fa-check"></i> Unlimited clients</li>
                                    <li><i class="fa fa-check"></i> Unlimited Files</li>
                                    <li><i class="fa fa-check"></i> Unlimited Folders</li>
                                </ul>
                            </div>
                            <div class="footer gold-footer">
                                <a href="">Start now</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="pricing-table">
                            <div class="pro-header">
                                <h3>Pro</h3>
                            </div>
                            <div class="price">
                                <div class="monthly-price">
                                    <div class="currency">£</div>
                                    <div class="amount">25</div>
                                </div>
                                <div class="Yearly-price">
                                    <div class="currency">£</div>
                                    <div class="amount">240</div>
                                </div>
                            </div>
                            <div class="body">
                                <ul>
                                    <li> <i class="fa fa-check"></i> Unlimited Admin</li>
                                    <li> <i class="fa fa-check"></i> Unlimited user</li>
                                    <li> <i class="fa fa-check"></i> Unlimited clients</li>
                                    <li> <i class="fa fa-check"></i> Unlimited Files</li>
                                    <li> <i class="fa fa-check"></i> Unlimited Folders</li>
                                </ul>
                            </div>
                            <div class="footer pro-footer">
                                <a href="">Start now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
        const switchToggler = document.querySelector(".toggle-switch")

        switchToggler.addEventListener("change", ()=> {
            if(switchToggler.checked){
                document.querySelector('.pricing-main').classList.add("active")
            }
            else{
                document.querySelector('.pricing-main').classList.remove("active")
            }
        })
    </script>

    <style>
        
    .pricing-plan{
        font-family: "Poppins", 'sans-serif';
        background: rgb(243, 243, 243);
        padding: 30px 0;
    }

    .switch-table{
        padding: 0 15px;
        margin-bottom: 35px;
    }

    .switch-table .text-monthly,
    .switch-table .text-yearly{
        font-size: 18px;
    }

    .pricing-main:not(.active) .switch-table .text-monthly,
    .pricing-main.active .switch-table .text-yearly{
        color: #3fb7ef;
    }

    .switch-table .custom-switch{
        margin: 0 20px;
        display: flex;
        position: relative;
        align-items: center;
        justify-content: center;
        height: 40px;
        width: 100px;
        background-color: #3fb7ef;
        border-radius: 30px;
        cursor: pointer;
    }

    .switch-table .custom-switch .toggle-switch{
        position: absolute;
        left: -9999px;
    }


    .switch-table .custom-switch span{
        height: 28px;
        width: 28px;
        background: white;
        border-radius: 50%;
        position: absolute;
        top: 6px;
        left: 6px;
        transition: left 0.5s ease;
    }
    .pricing-plan .pricing-main.active .switch-table .custom-switch span{
        left: calc(100% - 35px);
    }

    .pricing-table{
        margin: 0 15px;
        background-color: white;
        border-radius: 10px;
        overflow: hidden;
    }

    .pricing-table .silver-footer a,
    .pricing-table .silver-header{
        background-color: #5b58e8;
        padding: 15px 30px;
    }
    .pricing-table .gold-footer a,
    .pricing-table .gold-header{
        background-color: #ffc600;
        padding: 15px 30px;
    }
    .pricing-table .pro-footer a,
    .pricing-table .pro-header{
        background-color: #fc3c7f;
        padding: 15px 30px;
    }

    .pricing-table h3 {
        font-size: 30px;
        font-weight: 600;
        color: white;
        text-transform: capitalize;
        text-align: center;

    }

    .pricing-table .price{
        padding: 40px 0;
        display: flex;
    }

    .pricing-table .yearly-price,
    .pricing-table .monthly-price{
        padding: 0 30px;
        display: flex;
        justify-content: center;
        width: 100%;
        flex-shrink: 0;
        transition: all 0.5s ease;

    }
    .pricing-main.active .pricing-table .yearly-price,
    .pricing-main.active .pricing-table .monthly-price{
        transform: translateX(-100%);
    }

    .pricing-table .yearly-price .currency,
    .pricing-table .monthly-price .currency{
        font-size: 25px;
        color: #555555;
        font-weight: 700;
        line-height: 1;

    }
    .pricing-table .yearly-price .amount ,
    .pricing-table .monthly-price .amount {
        font-size: 85px;
        font-weight: 700;
        color: #555555;
        line-height: 0.8;
    }
    .pricing-table .body{
        padding: 0 30px;
    }

    .pricing-table .body ul li{
        color: #777777;
        font-weight: 300;
        margin-bottom: 15px;
    }

    .pricing-table .footer{
        padding: 30px;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    .pricing-table .footer a{
        text-transform: uppercase;
        color: white;
    }

    .pricing-table .footer a:hover{
        box-shadow: 0 0 15px rgba(0, 0, 0, 0.3);
    }


    </style>