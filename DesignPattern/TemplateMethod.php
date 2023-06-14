<?php

interface RequestHandlerInterface
{
    public function handle(Request $request): Response;
}

abstract class AbstractCheckedHandler implements RequestHandlerInterface
{
    public function handle(Request $request): Response
    {
        $isChecked = $this->checkCommonly($request) && $this->checkExternally($request);
        if (!$isChecked) {
            return new ErrorResponse();
        }

        $request $this->preProcessRequest($request);
        $response = $this->requestToResponse($request);
        return $this->postProcessResponse($response);
    }

    private function checkCommonly(Request $request): bool {
        // 共通のチェック
    }

    abstract protected function checkExternally(Request $request): bool;

    private function preProcessRequest(Request $request): Request {
        // 共通の事前処理
    }

    abstract protected function requestToResponse(Request $request): Response;

    private function postProcessResponse(Response $request): Request {
        // 共通の事後処理
    }
}

class UserAccessCheckedHandler extends AbstractCheckerHandler
{
    public function __construct(
        private UserAccessCheckerInterface $userAccessChecker
    ) {}

    protected function checkExternally(Request $request): bool {
        return $this->userAccessChecker->isAllowed($request->user);
    }

    protected function requestToResponse(Request $request): Response
    {
        // リクエストに対するレスポンスを返却
    }
}

class ResourceCheckedHandler extends AbstractCheckedHandler
{
    public function __construct(
        private ResourceCheckerInterface $resourceChecker
    ) {}

    protected function checkExternally(Request $request): bool {
        return $this->resourceChecker->isAllowed($request->resource);
    }

    protected function requestToResponse(Request $request): Response
    {
        // リクエストに対するレスポンスを返却
    }
}