document.addEventListener("DOMContentLoaded", () => {
  const imgContainer = document.querySelector(".img-container img");
  const fileInput = document.querySelector("input[type='file']");

  fileInput.addEventListener("change", () => {
    const file = fileInput.files[0];
    const reader = new FileReader();
    reader.onload = () => {
      const imageDataUrl = reader.result;
      imgContainer.src = imageDataUrl;
    };
    reader.readAsDataURL(file);
  });
});
