window.addEventListener('load', (event) => {
    console.log('page is fully loaded');
  });

  
// Setting the varaibles 
// PostsContainer to inject the posts dynamically 
// loader to show loading while loading the new post page 
// filter input to filter through the posts 
const postsContainer = document.getElementById('posts-container');
const loading = document.querySelector('.loader');
const filter = document.getElementById('filter');

// Setting limit per page for post & page number 
let limit = 5;
let page = 1;

// Fetch post from API
// Async way - waiting for the post to be ready and converted to JSON before returning the data 
async function getPosts() {
    const res = await fetch(`https://jsonplaceholder.typicode.com/posts?_limit=${limit}&_page=${page}`);

    const data = await res.json();

    return data;
}

// Show post in DOM
// Async way - waiting to fetch the posts from the server before loading the UI
async function showPosts() {
    const posts = await getPosts();
    

    // Dynamically injecting the post in the HTML
    posts.forEach(post => {
        const postEl = document.createElement('div');
        postEl.classList.add('post');
        postEl.innerHTML = `
            <div class="number">${post.id}</div>
            <div class="post-info">
                <h2 class="post-title">${post.title}</h2>
                <p class="post-body">${post.body}</p>
            </div>
        `;

        postsContainer.appendChild(postEl);
    });
}

// Show loader & fetch more posts 
function showLoading() {
    loading.classList.add('show');

    // Removing the loader after loading the new page 
    setTimeout(() => {
        loading.classList.remove('show');

        // Showing the new post page while the loader is flashing by incrementing the page number 
        setTimeout(() => {
            page++;
            showPosts();
        }, 600);

    }, 1000);
}

// Filter posts by input 
function filterPosts(e){
    // Getting the typed value and making it uppercase because it is case sensitive 
    const term = e.target.value.toUpperCase();

    // Getting all the posts as a NODE-LIST
    const posts = document.querySelectorAll('.post');

    // Getting the post title and body's inner text 
    // Making it uppercase to match with the search term 
    posts.forEach(post => {
        const title = post.querySelector('.post-title').innerText.toUpperCase();
        const body = post.querySelector('.post-body').innerText.toUpperCase();

        if(title.indexOf(term) > -1 || body.indexOf(term) > -1) {
            post.style.display = 'flex';
        } else {
            post.style.display = 'none';
        }
    });
}

// Show initial posts
showPosts();


// Setting scroll event on window object 
// Pulling object out of the document object - document.element
window.addEventListener('scroll', () => {

    // Destructuring to pull Elements out of the document.element object 
    const { scrollTop, scrollHeight, clientHeight } = document.documentElement;

    // Setting a specific point on the scroll to load the posts 
    if(scrollHeight + clientHeight >= scrollHeight - 5) {
        showLoading()
    }
});

//  Setting up the input event to filter the posts
filter.addEventListener('input', filterPosts); 