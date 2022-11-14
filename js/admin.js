let mmk = ' MMK'
let people = ' Peoples'
let totalUsers = ''

$('.lists-loader').hide()
$('.user-details-page').hide()



const activeHome = () => {
  homePageShow()
  $("#home").addClass('active')
  $("#users").removeClass('active')
  $("#withdrawal").removeClass('active')
  $("#recharge").removeClass('active')
  $("#more").removeClass('active')
}
const activeUsers = () => {
  listsPageShow()
  $("#home").removeClass('active')
  $("#users").addClass('active')
  $("#withdrawal").removeClass('active')
  $("#recharge").removeClass('active')
  $("#more").removeClass('active')
}
const activeWithdrawal = () => {
  listsPageShow()
  $("#home").removeClass('active')
  $("#users").removeClass('active')
  $("#withdrawal").addClass('active')
  $("#recharge").removeClass('active')
  $("#more").removeClass('active')
}
const activeRecharge = () => {
  listsPageShow()
  $("#home").removeClass('active')
  $("#users").removeClass('active')
  $("#withdrawal").removeClass('active')
  $("#recharge").addClass('active')
  $("#more").removeClass('active')
}
const activeMore = () => {
  morePageShow()
  $("#home").removeClass('active')
  $("#users").removeClass('active')
  $("#withdrawal").removeClass('active')
  $("#recharge").removeClass('active')
  $("#more").addClass('active')
}

const homePageShow = () => {
  adminData()
  $('#home-page').css("transform", "translateX(0%)")
  $('#lists-page').css("transform", "translateX(-110%)")
  $('#more-page').css("transform", "translateX(110%)")
}
const listsPageShow = () => {
  $('.content-container').scrollTop('0px')
  $('#home-page').css("transform", "translateX(-110%)")
  $('#lists-page').css("transform", "translateX(0%)")
  $('#more-page').css("transform", "translateX(110%)")
}

const morePageShow = () => {
  $('#home-page').css("transform", "translateX(110%)")
  $('#lists-page').css("transform", "translateX(-110%)")
  $('#more-page').css("transform", "translateX(0%)")
}

const adminData = () => {
  $.ajax({
    url: '../php/admin_data.php',
    type: 'GET',
    data: 'admin=minko',
    dataType: 'json',
    success: function (r) {
      totalUsers = r.users
      $('#total-users').text(totalUsers + people)
    }
  })
}

const usersListsData = () => {
  $('.lists-loader').show()
  $('.content-container').hide()
  $.ajax({
    url: '../php/users_lists.php',
    type: 'GET',
    data: 'content=users',
    success: function (r) {
      $('#sort').text('By date')
      $('.lists-loader').hide()
      $('.content-container').show()
      $('.content-container').html(r)
      seeUserDetails()
      bannUser()
    }
  })
  
}
const withdrawalListsData = () => {
  $('.lists-loader').show()
  $('.content-container').hide()
  $.ajax({
    url: '../php/users_lists.php',
    type: 'GET',
    data: 'content=withdrawal',
    success: function (r) {
      $('.lists-loader').hide()
      $('.content-container').show()
      $('.content-container').html(r)
    }
  })
  
}
const rechargeListsData = () => {
  $('.lists-loader').show()
  $('.content-container').hide()
  $.ajax({
    url: '../php/users_lists.php',
    type: 'GET',
    data: 'content=recharge',
    success: function (r) {
      $('.lists-loader').hide()
      $('.content-container').show()
      $('.content-container').html(r)
      imageView()
    }
  })
}

const sortUsersLists = value => {
  hideSortBox()
  $('.content-container').hide()
  $('.lists-loader').show()
  $.ajax({
    url: '../php/users_lists.php',
    type: 'get',
    data: `content=${value}`,
    success: function (r) {
      if (r != '') {
        hideSortBox()
        $('.lists-loader').hide()
        $('.content-container').show()
        $('.content-container').html(r)
        seeUserDetails()
        bannUser()
      } else {
        showSortBox()
        $('.lists-loader').hide()
        $('.content-container').show()
        $('.content-container').html(`
          <div class="empty-users-lists-box">
              Empty! 😥
          </div>
        `)
      }
    }
  })
}

const showSortBox = () => {
  $('#choice-btn').addClass('r-90')
  $('#sort-box').css({
    height: '290px',
    width: '200px',
    border: '1px solid #313539',
    padding: '5px'
  })
}
const hideSortBox = () => {
  $('#choice-btn').removeClass('r-90')
  $('#sort-box').css({
    height: '0px',
    width: '0px',
    border: 'none',
    padding: '0'
    })
}

const hideUserDetailsPage = () => {
  $('.user-details-page').hide()
}

const userDetails = id => {
  $.ajax({
    url: '../php/user_details.php',
    type: 'get',
    data: `id=${id}`,
    success: function (r) {
      $('.user-details-page').show()
      $('.user-details-page').html(`
      <span>
        <i id="user-details-page-hide" class="fa-solid fa-angle-left"></i>
      </span>
      ` + r)
      $('#user-details-page-hide').click(hideUserDetailsPage)
    }
  })
}



const imageView = () => {
  $('img').click(function (e) {
    let src = e.target.getAttribute('src')
    $('#image-view').css({display: 'flex'})
    $('#image-view img').attr('src', src)
  })
  
  $('#image-view-close').click(function () {
    $('#image-view').hide()
  })
}
const seeUserDetails = () => {
  $('.see-btn').click(function (e) {
    userDetails(e.currentTarget.id)
  })
}
const bannUser = () => {
  $('.bann-btn').click(function (e) {
    alert(e.currentTarget.id)
  })
}

window.onload = function () {
  activeHome()
  homePageShow()
}

$('#choice-btn').click(function () {
  if (!$('#choice-btn').hasClass('r-90')) {
    showSortBox()
  } else {
   hideSortBox()
  }
})


$('#sort-box div').click(function (e) {
  $('#sort-box div').removeClass('sort-check')
  $('#sort').text(e.target.textContent)
  e.target.classList.add('sort-check')
  if (e.target.textContent == 'By date') {
    sortUsersLists('date')
  }
  if (e.target.textContent == 'By name') {
    sortUsersLists('name')
  }
  if (e.target.textContent == 'By population') {
    sortUsersLists('population')
  }
  if (e.target.textContent == 'By silver member') {
    sortUsersLists('silver')
  }
  if (e.target.textContent == 'By platinum member') {
    sortUsersLists('platinum')
  }
  if (e.target.textContent == 'By gold member') {
    sortUsersLists('gold')
  }
  if (e.target.textContent == 'By diamond member') {
    sortUsersLists('diamond')
  }
  if (e.target.textContent == 'By vip member') {
    sortUsersLists('vip')
  }
  if (e.target.textContent == 'By not member') {
    sortUsersLists('none')
  }
})



$('document').ready(function () {
  $('#home').click(function () {
    activeHome()
  })
  $('#users').click(function () {
    activeUsers()
    $('.title .choice-box').show()
    $('#title').text('Users')
    usersListsData()
  })
  $('#withdrawal').click(function () {
    activeWithdrawal()
    $('.title .choice-box').hide()
    $('#title').text('Withdrawal requests')
    withdrawalListsData()
  })
  $('#recharge').click(function () {
    activeRecharge()
    $('.title .choice-box').hide()
    $('#title').text('Recharge requests')
    rechargeListsData()
  })
  $('#more').click(function () {
    activeMore()
  })
  
  $('#close-search').hide()
  
  $('#search').click(function () {
    $('#search-value').css({
        width: '220px',
        padding: '5px 10px',
        border: '1px solid #313539'
      })
  })
  
  $('#search-value').on('keyup', function () {
    if ($('#search-value').val() != '') {
      $('#close-search').show()
    } else {
      $('#close-search').hide()
    }
  })
  
  $('#close-search').click(function () {
    $('#search-value').val('')
    $('#close-search').hide()
  })
  
})