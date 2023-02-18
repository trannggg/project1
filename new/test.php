/*menu*/
.menu{
    width: 100%;
    height: 100px;
    background: linear-gradient(115deg, #d16ba5, #86a8e7, #5ffbf1);
    margin: 0px auto;
}

.menu ul{
    list-style: none;

}

.menu ul li{
    display: inline-block;
    padding: 20px;

}
.menu ul li a{
    text-decoration: none;
    font-size: 15px;
    font-weight: bold;
    color: black;
}

/*other*/

.others{
    flex: 2;
    display: flex;
}
.others > li{
    padding: 0 12px;
    position: relative;
    cursor: pointer
}
.others > li::after{
    content:"";
    display: block;
    width: 1px;
    height: 50% ;
    background: #dddddd;
    position: absolute;
    right: 0;
    top: 50%;
    transform: translatey(-50%);

}
.others>li:last-child::after{
    display: none;
}
.others > li:first-child{
    position: relative;
}
.others > li:first-child input{
    width: 100%;
    border: none;
    border-bottom: 1px solid #333;
    background: transparent;
    outline: none;
    line-height: 1.6;
}
.others > li:first-child i{
    position: absolute;
    right: 10px;
}