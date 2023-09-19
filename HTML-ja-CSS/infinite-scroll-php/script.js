let page = 1;
const postsPerPage = 20;
let loading = false;

function loadPosts() {
  if (loading) return;
  loading = true;

  document.getElementById("loading").style.display = "block";

  fetch(`load_posts.php?page=${page}&postsPerPage=${postsPerPage}`)
    .then((response) => response.json())
    .then((data) => {
      document.getElementById("loading").style.display = "none";

      const postContainer = document.getElementById("post-container");
      data.forEach((post) => {
        // Luo uusi div-elementti jokaiselle postaukselle
        const postElement = document.createElement("div");
        postElement.classList.add("post");
        postElement.textContent = post;
        postContainer.appendChild(postElement);
      });

      page++;
      loading = false;
    });
}

loadPosts();

window.addEventListener("scroll", () => {
  if (window.innerHeight + window.scrollY >= document.body.offsetHeight - 200) {
    loadPosts();
  }
});
