import ctEvents from 'ct-events'

export const mountElementorIntegration = () => {
	if (!window.elementorFrontend) {
		return
	}

	setTimeout(() => {
		elementorFrontend.elements.$document.off(
			'click',
			elementorFrontend.utils.anchors.getSettings('selectors.links'),
			elementorFrontend.utils.anchors.handleAnchorLinks
		)
	}, 1000)

	ctEvents.on('blocksy:frontend:init', () => {
		elementorFrontend.init()
	})
}
