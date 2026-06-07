# 🌾 MyPadi

MyPadi is a mobile application that utilizes Deep Learning and Computer Vision techniques to identify paddy leaf diseases from images. The application enables farmers and agricultural practitioners to quickly diagnose paddy diseases by uploading or capturing images of paddy leaves using their smartphones.

The system integrates a React Native mobile application with a Flask-based machine learning API powered by the EfficientNet architecture.

---

## Screenshots

Dashboard:
![image alt](https://github.com/BaceksGit/MyPadiLaravel/blob/4a7af71dae26583994205b701cba72fbc86087a6/screenshots/Screenshot%202026-06-07%20135342.png)

Home:
![image alt](https://github.com/BaceksGit/MyPadiLaravel/blob/6be821d5d2f6fb5a43437df9c57dde64832dfc06/screenshots/Screenshot%202026-06-07%20135401.png)

Scan Button:
![image alt](https://github.com/BaceksGit/MyPadiLaravel/blob/6be821d5d2f6fb5a43437df9c57dde64832dfc06/screenshots/Screenshot%202026-06-07%20135342.png)

Prediction:
![image alt](https://github.com/BaceksGit/MyPadiLaravel/blob/6be821d5d2f6fb5a43437df9c57dde64832dfc06/screenshots/Screenshot%202026-06-07%20134925.png)

## Features

* Capture paddy leaf images using the device camera
* Upload images from the gallery
* Automatic disease classification using Deep Learning
* Confidence score for each prediction
* Disease information and treatment recommendations
* Scan history management
* User authentication and account management
* Real-time communication with Flask API

---

## Machine Learning Model

The disease classification model is based on EfficientNet and was trained using a paddy disease image dataset containing multiple disease categories.

### Model Pipeline

1. Data Collection
2. Data Preprocessing
3. Feature Extraction
4. Model Training
5. Model Evaluation
6. Deployment

### Technologies Used

* TensorFlow
* Keras
* EfficientNet
* Python
* Flask
* Laravel

---

## System Architecture

```text
Laravel Application (Laravel)
            │
            ▼
        Flask API
            │
            ▼
   EfficientNet Model
            │
            ▼
 Disease Prediction
            │
            ▼
 Treatment Recommendation
            │
            ▼
      MySQL Database
```


## Disease Detection Process

1. User captures or uploads a paddy leaf image.
2. The image is sent to the Flask API.
3. The EfficientNet model processes the image.
4. The model predicts the disease class.
5. The prediction confidence is calculated.
6. Results are returned to the mobile application.
7. Disease information and treatment recommendations are displayed.
8. The scan result is stored in the database.

---

## Objectives

* Assist farmers in early disease detection.
* Reduce dependency on manual disease identification.
* Improve crop monitoring efficiency.
* Promote the use of Artificial Intelligence in agriculture.


---

## Developer

Developed as a Final Year Project (FYP) focusing on the application of Deep Learning and Mobile Computing in smart agriculture.

---

## License

This project is developed for academic and research purposes.
