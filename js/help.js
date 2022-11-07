const searchInput = document.querySelector('#search-input')
const searchIcon = document.querySelector('#search-icon')
const searchResultBoxContainer = document.querySelector('.result-box-container')

let searchValue = ''
const searchEnd = () => {
  searchResultBoxContainer.style.display = 'none'
  searchInput.value = ''
  searchIcon.classList.remove('fa-xmark')
  searchIcon.classList.add('fa-search')
  searchResultBoxContainer.innerHTML = ''
}

searchInput.addEventListener('keyup', () => {
  searchValue = searchInput.value
  if (searchValue.length != '') {
    searchIcon.classList.add('fa-xmark')
    searchIcon.classList.remove('fa-search')
    searchResultBoxContainer.style.display = 'flex'
    searchResultBoxContainer.innerHTML = `
                                          <div class="not-found-box">
                                            <img src="../images/not_found.png">
                                            <h3>Oops!</h3>
                                            <h4>Nothing found</h4>
                                          </div>
                                          `
    searchIcon.addEventListener('click', () => {
    searchEnd()
  })
  } else {
    searchEnd()
  }
})

