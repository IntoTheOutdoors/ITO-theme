@media screen and (min-width: 426px) and (max-width: 768px) {
  .breadcrumb {
    li {
      font-size: 1.4rem;
    }

    a {
      text-decoration: none;
    }
  }

  .episode {
    &-videos {
      #player,
      iframe {
        height: 300px;
      }
    }

    &-info {
      flex-direction: row;
      justify-content: space-between;

      &-title {
        h5 {
          font-size: 1.8rem;
        }

        p {
          font-size: 1.4rem;
        }
      }

      &-labels {
        margin-top: 20px;
        p {
          font-size: 1.4rem !important;
          text-transform: uppercase;
        }
        span {
          margin: 0 4px;
          font-size: 1.2rem;
        }
      }

      &-lessons {
        border-bottom-left-radius: 0px;
        h5 {
          font-size: 1.8rem !important;
        }

        a {
          padding: 10px 20px;
          font-size: 1.4rem;
        }
      }
    }

    &-top {
      flex-direction: row;

      &-container {
        width: 70%;
      }

      &-lists {
        width: 30%;
        align-self: flex-start;
        margin: 0;
        margin-left: 20px;

        h5 {
          font-size: 20px;
        }

        p {
          font-size: 14px;
        }
      }

      .dropdown {
        span {
          font-size: 14px;
        }
      }
    }

    &-details {
      &-content {
        p {
          font-size: 12px;
        }
      }
    }

    &-bottom {
      margin-top: 20px;
      display: flex;
      flex-direction: row;
    }

    &-bottom-details {
      width: 70%;
    }

    &-bottom-related {
      width: 30%;
      height: 100%;
      padding: 0;
      margin: 0;
      margin-left: 10px;

      h4 {
        margin-top: 10px;
      }

      img {
        width: 160px;
      }

      p {
        padding: 0;
        margin: 0;
      }

      a {
        display: flex;
        flex-direction: column;
      }
    }
  }

  .nav {
    &-tabslist {
      &-link {
        span {
          font-size: 14px;
        }
      }
    }
  }

  .dropdown {
    span {
      font-size: 12px !important;
    }
  }
}

@media screen and (min-width: 769px) {
  .breadcrumb {
    li {
      font-size: 18px;
    }
  }

  .episode {
    &-videos {
      #player,
      iframe {
        height: 600px;
      }
    }

    &-info {
      flex-direction: row;
      justify-content: space-between;
      margin-bottom: 20px;

      &-title {
        padding: 20px;
        h5 {
          font-size: 20px !important;
        }

        p {
          font-size: 18px;
          margin: 0;
        }
      }

      &-lessons {
        border-bottom-left-radius: 0px;
        padding: 20px;

        h5 {
          font-size: 20px;
        }

        p {
          font-size: 16px;
        }

        a {
          font-size: 16px;
        }
      }
    }

    &-top {
      flex-direction: row;

      &-container {
        width: 70%;
      }

      &-lists {
        width: 30%;
        align-self: flex-start;
        margin: 0;
        margin-left: 10px;

        h5 {
          font-size: 20px;
        }

        &-curriculum {
          display: flex;
          flex-direction: column;
        }

        &-full-item,
        &-curriculum-item {
          padding: 10px;
          margin: 0;

          p {
            font-size: 16px;
          }

          &-curriculum-item {
            &:last-child {
              margin-bottom: 10px;
            }
          }
        }
      }
    }

    &-bottom {
      display: flex;

      &-details {
        width: 70%;
      }

      &-related {
        width: 30%;
        height: 100%;
        margin-left: 10px;
      }
    }
  }

  .nav {
    &-tabslist {
      &-item {
        span {
          font-size: 18px;
        }
      }
    }
  }

  .tab-pane {
    p {
      font-size: 16px;
    }
  }

  .dropdown {
    span {
      font-size: 14px !important;
    }
  }
}
