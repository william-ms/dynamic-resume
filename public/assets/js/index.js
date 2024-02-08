window.onload = ()=>
{
  const projects = document.querySelectorAll('.project');

  projects.forEach((project)=>
  {
    let projectThumb = project.querySelector('.project-thumb');
    let projectModal = project.querySelector('.project-modal');
    let btnCloseModal = project.querySelector('.project-content-close');

    projectThumb.addEventListener('click', ()=>
    {
      if(!projectModal.classList.contains('modal-show'))
      {
        projectModal.classList.add('modal-show');
      }
    })

    btnCloseModal.addEventListener('click', ()=>
    {
      if(projectModal.classList.contains('modal-show'))
      {
        projectModal.classList.remove('modal-show');
      }
    })
  })
}