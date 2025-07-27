// plugins/lenis.js
import Lenis from '@studio-freight/lenis'
import { ScrollTrigger } from 'gsap/ScrollTrigger'

export default {
  install(app) {
    const lenis = new Lenis({
      duration: 1.2,
      easing: t => Math.min(1, 1.001 - Math.pow(2, -10 * t)),
      smooth: true,
    })

    function raf(time) {
      lenis.raf(time)
      ScrollTrigger.update() // ← esto sincroniza con GSAP
      requestAnimationFrame(raf)
    }

    requestAnimationFrame(raf)

    app.config.globalProperties.$lenis = lenis
  }
}
