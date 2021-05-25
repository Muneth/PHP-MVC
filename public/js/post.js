const postsContainer = document.getElementById("postContainer");
const loading = document.querySelector(".loader");
const filter = document.getElementById("filter");

// Setting limit per page for post & page number
let limit = 5;
let page = 1;

const fetchResponses = async (...endpoints) => {
  return await Promise.all(endpoints.map((endpoint) => fetch(endpoint)));
};

const fetchJsons = async (...endpoints) => {
  try {
    const responses = await fetchResponses(...endpoints);
    return await Promise.all(responses.map((response) => response.json()));
  } catch (e) {
    console.warn(e);
    return null;
  }
};

// Fetching data from different API's and Displaying as a post

async function showPosts() {
  const [photos, posts, user] = await fetchJsons(
    `https://picsum.photos/v2/list?page=${page}&limit=${limit}`,
    `https://jsonplaceholder.typicode.com/posts?_limit=${limit}&_page=${page}`,
    `https://randomuser.me/api/?results=${limit}`
  );
  if (posts.length === 0) return;

  const userRes = user.results;

  photos.forEach((photo, i) => {
    postsContainer.insertAdjacentHTML(
      "beforeend",
      `
      <article class="card"><div class="article__header"><img  src="${
        photo.download_url
      }" alt="Post image"/></div>
        <div class="article__info--container">
          <h2 class="article__title">${posts[i].title}</h2>
          <p class="article__summary">${posts[i].body}</p>
          <div class="card__footer">
            <div class="author">
              <div class="profile-picture">
                <img src="${
                  userRes[i].picture.thumbnail
                }" alt="Author profile picture"/></div>
              <div class="author__info"><div class="name">${
                userRes[i].name.first
              } ${userRes[i].name.last}</div>
                <div class="date">${randomDate(
                  new Date(2012, 0, 1),
                  new Date()
                )}</div>
              </div>
        </div>      
    </article>
      `
    );
  });
}

// Function to get randon date
function randomDate(start, end) {
  return new Date(
    start.getTime() + Math.random() * (end.getTime() - start.getTime())
  );
}

// Show loader & fetch more posts
function showLoading() {
  loading.classList.add("show");

  // Removing the loader after loading the new page
  setTimeout(() => {
    loading.classList.remove("show");

    // Showing the new post page while the loader is flashing by incrementing the page number
    setTimeout(() => {
      page++;
      // console.log("getting more posts");
      showPosts();
    }, 600);
  }, 1000);
}

// Show initial posts
showPosts();

// Setting scroll event on window object
// Pulling object out of the document object - document.element
window.addEventListener("scroll", () => {
  // Destructuring to pull Elements out of the document.element object
  const { scrollTop, scrollHeight, clientHeight } = document.documentElement;

  // Setting a specific point on the scroll to load the posts
  if (scrollTop + clientHeight >= scrollHeight - 5) {
    // console.log("showing loader");
    showLoading();
  }
});
