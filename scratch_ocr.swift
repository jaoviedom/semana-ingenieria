import Foundation
import Vision
import AppKit

let url = URL(fileURLWithPath: "/Users/joseoviedo/.gemini/antigravity-ide/brain/a784b573-8c8b-44e2-8651-f800ee01cdb4/.user_uploaded/media_1792717657066.jpg")
guard let image = NSImage(contentsOf: url),
      let cgImage = image.cgImage(forProposedRect: nil, context: nil, hints: nil) else {
    exit(1)
}

let request = VNRecognizeTextRequest { (request, error) in
    guard let observations = request.results as? [VNRecognizedTextObservation] else { return }
    for obs in observations {
        if let top = obs.topCandidates(1).first {
            if obs.boundingBox.origin.y < 0.12 {
                print("\(obs.boundingBox.origin.x), \(obs.boundingBox.origin.y): \(top.string)")
            }
        }
    }
}
request.recognitionLanguages = ["es", "en"]
request.recognitionLevel = .accurate

let handler = VNImageRequestHandler(cgImage: cgImage, options: [:])
try? handler.perform([request])
